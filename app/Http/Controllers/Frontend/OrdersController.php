<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index(){
        $orders1=Orders::where('order_status','1')
            ->where('user_id',Auth::user()->id)
            ->orderByDesc('id')
            ->get();
        $orders2=Orders::where('order_status','2')
            ->where('user_id',Auth::user()->id)
            ->orderByDesc('id')
            ->get();
        $orders3=Orders::where('order_status','3')
            ->where('user_id',Auth::user()->id)
            ->orderByDesc('id')
            ->get();
        return view('frontend.my-order')
            ->with(compact('orders1'))
            ->with(compact('orders2'))
            ->with(compact('orders3'));
    }
    public function orderDetails($id){
            $orders=OrderDetails::where('order_id',$id)->get();
            $orderStatus=Orders::where('id',$id)->first();
            $orderStatusValue=$orderStatus->order_status;
            return view('frontend.order-details')
                ->with(compact('orders'))
                ->with(compact('orderStatusValue'));
    }
}
