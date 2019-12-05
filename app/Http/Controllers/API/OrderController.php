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
     *         type="integer",
     *         description="Which user is making order",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="gameId",
     *         in="formData",
     *         type="integer",
     *         description="Which game user wants",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="location",
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
     *         type="string",
     *         description="How long to be active",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="modId",
     *         in="formData",
     *         type="string",
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
     */
    public function createOrder(Request $request)
    {

    }


}
