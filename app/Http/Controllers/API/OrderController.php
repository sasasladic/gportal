<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    private $order_repo;

    /**
     * OrderRepositoryInterface constructor.
     * @param $order_repo
     */
    public function __construct(OrderRepositoryInterface $order_repo)
    {
        $this->order_repo = $order_repo;
    }

    /**
     * @SWG\Post(
     *      path="/order",
     *      summary="Login with jwt",
     *      description="Make order",
     *     @SWG\Parameter(
     *         name="userId",
     *         in="formData",
     *         type="string",
     *         description="Which user is making order",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="serverId",
     *         in="formData",
     *         type="string",
     *         description="Which server wants",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="slotNumber",
     *         in="formData",
     *         type="string",
     *         description="How many pings",
     *         required=true,
     *     ),
     *      @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     *     )
     *
     * @param Request $request
     */
    public function createOrder(Request $request)
    {

    }


}
