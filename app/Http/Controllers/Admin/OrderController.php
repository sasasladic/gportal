<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;
use App\Repositories\OrderRepositoryInterface;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{

    private $orders;

    public function __construct(
        OrderRepositoryInterface $orders
    ) {
        $this->orders = $orders;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.order.index', ['data' => $this->orders->all(), 'all_statuses' => OrderStatus::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $order
     * @return void
     */
    public function show(Order $order)
    {
        return view('admin.order.show', ['data' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function status_update(Request $request)
    {
        $order = $this->orders->get($request->get('order'));
        $order->order_status_id = $request->get('id');
        $order->save();

        $data = array();
        $data['status'] = $order->order_status->name;
        $data['email'] = $order->user->email;
        $data['name'] = $order->user->first_name . ' ' . $order->user->last_name;
        $data['first_name'] = $order->user->first_name;
        $data['subject'] = 'Server status changed';
        send_email('admin.email.server_status', $data);

        return "Success";
    }

    /**
     * Generate .pdf for order (invoice)
     *
     * @param $id
     * @return mixed
     */
    public function toPdf($id)
    {
        $data = array();
        $order = $this->orders->get($id);
        $data['order_no'] = $order->order_no;
        $data['order_status'] = isset($order->order_status->name) ? $order->order_status->name : 'Not selected';
        $time = strtotime($order->created_at);
        $data['created_at'] = date('d-m-Y H:i', $time);
        $data['server'] = $order->server->name;
        $sum = 0;
        if ($order->server) {
            $data['id'] = 1;
            $data['name'] = $order->server->name;
            $data['slots'] = $order->server->slots;
            $data['price_per_slot'] = $order->server->machine->price_per_slot;
            $data['mod'] = $order->server->mod->name;
            $data['sum'] = $order->server->slots * $order->server->machine->price_per_slot;
            $data['user'] = $order->user->first_name . ' ' . $order->user->last_name;
            $data['user_id'] = $order->user->id;
            $data['email'] = $order->user->email;
            $data['country'] = $order->user->country;
//            $data['image'] = File::get('storage/image/logo.png');
            $pdf = $pdf = PDF::loadView('admin.reports.order', $data);
            $file_name = $data['order_no'] . '_' . '' . $data['created_at'] . '.pdf';
            return $pdf->download($file_name);
        }
        return redirect()->back();
    }
}
