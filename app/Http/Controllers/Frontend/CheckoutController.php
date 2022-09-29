<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\newOrder;
use App\Models\Baskets;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index(){
        $user=User::where('id',Auth::user()->id)->first();
        $id=Auth::user()->id;
        $baskets=Baskets::where('user_id',$id)->get();
        $total=0;
        foreach ($baskets as $basket){
            $total+=$basket->products->product_price*$basket->product_count;
        }
        return view('frontend.checkout')
            ->with(compact('user'))
            ->with(compact('baskets'))
            ->with(compact('total'));
    }
    public function checkoutConfirm(Request $request){
        $request->validate([
           'phone'=>'required',
            'address'=>'required',
            'posta'=>'required',
            'city'=>'required'
        ]);
        $user=User::find(Auth::user()->id);
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->posta=$request->posta;
        $user->city=$request->city;
        $user->save();
        if ($user){
           return redirect(route('payment'));
        }else{
           return redirect(route('checkoutConfirm'))->with('no','Bilgileri eksiksiz doldurduğunuzdan ve sözleşmeyi işaretlediğinizden emin olun');
        }

    }
    public function payment(){
        return view('frontend.payment');
    }
    public function newOrder(){
        $id=Auth::user()->id;
        $email=Auth::user()->email;
        $baskets=Baskets::where('user_id',$id)->get();
        $total_price=0;
        $total_count=0;
        foreach ($baskets as $basket){
            $total_price+=$basket->products->product_price*$basket->product_count;
            $total_count+=$basket->product_count;
        }
        $order=new Orders();
        $order->user_id=$id;
        $order->product_total_count=$total_count;
        $order->total_price=$total_price;
        $order->order_status=1;
        $order->save();
        $lastId=$order->id;
        $mailOrder= Orders::find($lastId);

        $array=[
          'name'=>Auth::user()->name,
            'code'=>$mailOrder->id,
            'time'=>$mailOrder->time,
            'totalPrice'=>$mailOrder->total_price,
            'totalCount'=>$mailOrder->product_total_count
        ];
        if($order){
                foreach ($baskets as $basket){
                    $orderDetails=new OrderDetails();
                    $orderDetails->order_id=$lastId;
                    $orderDetails->product_id=$basket->products->id;
                    $orderDetails->product_price=$basket->products->product_price*$basket->product_count;
                    $orderDetails->product_count=$basket->product_count;
                    $orderDetails->save();
                }
                Baskets::where('user_id',Auth::user()->id)->delete();
                //Mail::to($email)->send(new newOrder($lastId));
                Mail::send('mail.newOrder',$array,function($message){
                    $message->from('mailsupchat@gmail.com','Male Fashion');
                    $message->subject('Sipariş Faturası');
                    $message->to(Auth::user()->email);
                });
           return redirect(route('user.myOrder'))->with('order','ok');
        }else{
            return  redirect(route('user.shoppingCart'))->with('order','no');
        }

    }
}
