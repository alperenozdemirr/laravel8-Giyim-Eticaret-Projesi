<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function allOrders(){
        $orders=Orders::paginate(10);

        return view('backend.all-orders')
            ->with(compact('orders'));
    }
            public function supplyOrders(){
                $orders=Orders::where('order_status',1)->paginate(10);

                return view('backend.supply-orders')
                    ->with(compact('orders'));
            }
            public function cargoOrders(){
                $orders=Orders::where('order_status',2)->paginate(10);

                return view('backend.cargo-orders')
                    ->with(compact('orders'));
            }
            public function successOrders(){
                $orders=Orders::where('order_status',3)->paginate(10);

                return view('backend.success-orders')
                    ->with(compact('orders'));
            }

    public function orderDetails($id){
        $orders=OrderDetails::where('order_id',$id)->get();
        $orderStatus=Orders::where('id',$id)->first();
        $orderStatusValue=$orderStatus->order_status;
        $orderid=$id;
        return view('backend.order-details')
            ->with(compact('orders'))
            ->with(compact('orderStatusValue'))
            ->with(compact('orderid'));
    }

    public function orderStatusUpdate($id,$value){
        $order=Orders::where('id',$id)->first();
        $order->order_status=$value;
        $order->save();
        if ($order){
            return redirect(route('orderDetails',$id))
                ->with('success','ok');
        }else{
            return redirect(route('allOrders'))->with('error','ok');
        }
    }
}
