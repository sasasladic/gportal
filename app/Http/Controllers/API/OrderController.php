<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Image;
use App\Mail\OrderMail;
use App\Order;
use App\Repositories\GameRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{

    private $order_repo;
    private $user_repo;
    private $game_repo;

    /**
     * OrderRepositoryInterface constructor.
     * @param OrderRepositoryInterface $order_repo
     * @param UserRepositoryInterface $user_repo
     * @param GameRepositoryInterface $game_repo
     */
    public function __construct(
        OrderRepositoryInterface $order_repo,
        UserRepositoryInterface $user_repo,
        GameRepositoryInterface $game_repo
    ) {
        $this->order_repo = $order_repo;
        $this->user_repo = $user_repo;
        $this->game_repo = $game_repo;
    }

    /**
     * @SWG\Post(
     *      path="/order",
     *      summary="Make order",
     *      description="Make order",
     *     @SWG\Parameter(
     *         name="gameId",
     *         in="formData",
     *         type="integer",
     *         description="Which game user wants",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="machineId",
     *         in="formData",
     *         type="integer",
     *         description="Where to be stored",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="slots",
     *         in="formData",
     *         type="integer",
     *         description="How many slots",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="months",
     *         in="formData",
     *         type="integer",
     *         description="How long to be active",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="serverName",
     *         in="formData",
     *         type="string",
     *         description="Server Name",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="modId",
     *         in="formData",
     *         type="integer",
     *         description="Which mod",
     *         required=true,
     *     ),
     *      @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     *     )
     *
     * @param Request $request
     * @return Order
     */
    public function makeOrder(Request $request)
    {
        $user = auth()->user();

        if($request->get('image')) {
            $image = $request->get('image');

            $imagePath = date('Y') . '/' . date('m') . '/' . date('d');
            $imageType = substr($image['info']['name'], strrpos($image['info']['name'], '.'));
            $imageName = $user->first_name . $user->last_name . $imageType;

            $data = substr($image['dataUrl'], strpos($image['dataUrl'], ',') + 1);
            Storage::disk('local')->put("public/payment-slips/$imagePath/$imageName" , base64_decode($data));

            $imageObject = new Image();
            $imageObject->path = "/storage/payment-slips/$imagePath/$imageName";
            $imageObject->save();
        }

        $attrs = $request->except('image');
        $attrs['order_no'] = time();
        $attrs['user_id'] = $user->id;
        $attrs['order_status_id'] = 3;
        if(isset($imageObject)) {
            $attrs['image_id'] = $imageObject->id;
        }

        $order = new Order($attrs);
        $order->save();

        Mail::to('sasa96.sladic@gmail.com')->send(new OrderMail());

        return response(['message' => 'You have successfully ordered the server!']);
    }

    public function allOrders ()
    {
        $user = auth()->user();
        OrderResource::withoutWrapping();
        return OrderResource::collection($this->order_repo->findByUser($user->id));
    }
}
