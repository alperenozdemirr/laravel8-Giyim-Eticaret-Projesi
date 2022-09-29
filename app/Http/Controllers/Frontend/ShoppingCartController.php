<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baskets;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index(){
        //buraya sepet ile ürünler arasında ilişki kurulup veri cekilecektir!!Yapıldı!
        $id=Auth::user()->id;
        $baskets=Baskets::where('user_id',$id)->get();
        $total=0;
        foreach ($baskets as $basket){
            $total+=$basket->products->product_price*$basket->product_count;
        }
        return view('frontend.shopping-cart')->with(compact('baskets'))->with(compact('total'));
    }
    //post
    public function addCart(Request $request){
         $basket =new Baskets();
         $basket->user_id=Auth::user()->id;
         $basket->product_id=$request->product_id;
         $basket->product_count=$request->product_count;
         $basket->save();
         if ($basket){
            return redirect(route('user.shoppingCart'))->with('shopping-cart','ok');
         }else{
             return back();
         }
    }
    //get isteği id
    public function addCartCount($id){
        $basket= Baskets::find($id);
        $count=$basket->product_count;
        $basket->product_count=$count+1;
        $basket->save();
        if ($basket){
            return redirect(route('user.shoppingCart'))->with('countAdd','ok');
        }else{
            return back();
        }
    }

    public function sourCartCount($id){
        //href yerine form ile gönder veya script'i engelle anlık olmuyor.....Çözüldü!!
        //total'i hesaplayarak gönder
        //header view share oluştur.
        $basket= Baskets::find($id);
        $count=$basket->product_count;
            if ($count!=1){
                $basket->product_count=$count-1;
                $basket->save();
            }
            else{
                $id= Baskets::find($id);
                $basket=$id->delete($id);
            }
        if ($basket){
            return redirect(route('user.shoppingCart'))->with('countSour','ok');
        }else{
            return back();
        }
    }

    public function removeCart($id){
        $id= Baskets::find($id);
        $basket=$id->delete($id);

        if ($basket){
            return redirect(route('user.shoppingCart'))->with('remove','ok');
        }else{
            return back();
        }
    }




}
