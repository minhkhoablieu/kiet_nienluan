<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status_id', 2)->get();
        $ordersProcessed = Order::whereIn('status_id', [

            3,
        ])->get();

        return view('admin.order.index',[
            'title' => 'Tất cả đơn hàng',
            'orders' => $orders,
            'ordersProcessed' =>  $ordersProcessed
        ]);
    }
    public function show(Order $order)
    {
        $statuses = Status::all();
        return view('admin.order.show',[
            'order' => $order,
            'title' => 'Chi tiết đơn hàng',
            'statuses' => $statuses
        ]);
    }
    public function updateStatus(Request $request ,Order $order)
    {
        $status = Status::findOrFail($request->post('status'));
//        dd($status);
        $order->status()->associate($status);
        $order->save();
        return redirect()->back();
    }
    public function destroy(Order $order)
    {
        return $order->delete();
    }
}
