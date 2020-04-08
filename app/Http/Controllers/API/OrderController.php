<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Order;
use App\Repositories\GameRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ServerRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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



        $game = $this->game_repo->get($request->get('gameId'));
        $server = new Server();
        $server->name = $request->get('serverName');
        $server->slots = $request->get('slots');
        $server->status = 'Deaktiviran';
        $server->machine_id = $request->get('machineId');
        $server->game_id = $game->id;
        $server->user_id = $user->id;
        $server->mod_id = $request->get('modId');
        $server->expire_on = date('y-m-d', strtotime("+" . $request->get('months') . "month", time()));
        $server->save();

        $order = new Order();
        $order->order_no = time();
        $order->order_status_id = 2;
        $order->user_id = $user->id;
        $order->server_id = $server->id;
        $order->price = $server->machine->price_per_slot * $server->slots;
        $order->save();

        $order->server;
        $order->user;
        $order->server;
        $order->order_status;

        return $order;
    }
}
