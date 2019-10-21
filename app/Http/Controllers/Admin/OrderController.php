<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OrderStatus;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order.index', ['data' => $this->orders->all(), 'all_statuses' => OrderStatus::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
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
}