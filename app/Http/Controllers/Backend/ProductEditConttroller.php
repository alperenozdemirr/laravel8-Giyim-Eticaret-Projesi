<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
class ProductEditConttroller extends Controller
{
    public function productList(){
        $products = Products::orderByDesc('id')->paginate(10);
        $categories = Categories::all();
        return view('backend.product-list')
            ->with(compact('products'))
            ->with(compact('categories'));

    }
    public function productEditPage($id){
        $product= Products::whereId($id)->first();
        $categories = Categories::all();
        return view('backend.product-edit')
            ->with(compact('product'))
            ->with(compact('categories'));
    }
    public function productNew(){
        $categories = Categories::all();
        return view('backend.product-new')
            ->with(compact('categories'));;
    }
    public function productNewPost(Request $request){
        if($request->has(['name','img1','img2','img3','img4','price','info','categori'])){

                $request->validate([
                    'img1'=>'required|image|mimes:jpg,jpeg,image,png|max:12096',
                    'img2'=>'required|image|mimes:jpg,jpeg,image,png|max:12096',
                    'img3'=>'required|image|mimes:jpg,jpeg,image,png|max:12096',
                    'img4'=>'required|image|mimes:jpg,jpeg,image,png|max:12096'
                ]);
                $img1=uniqid().'.'.$request->img1->getClientOriginalExtension();
                $img2=uniqid().'.'.$request->img2->getClientOriginalExtension();
                $img3=uniqid().'.'.$request->img3->getClientOriginalExtension();
                $img4=uniqid().'.'.$request->img3->getClientOriginalExtension();
                $request->img1->move(public_path('frontend').'/img/product',$img1);
                $request->img2->move(public_path('frontend').'/img/product',$img2);
                $request->img3->move(public_path('frontend').'/img/product',$img3);
                $request->img4->move(public_path('frontend').'/img/product',$img4);
                $products=new Products;
                $products->product_name = $request->name;
                $products->categori= $request->categori;
                $products->product_info = $request->info;
                $products->product_price = $request->price;
                $products->img1 = $img1;
                $products->img2 = $img2;
                $products->img3 = $img3;
                $products->img4 = $img4;
                $products->save();


            if ($products){
                return redirect(route('admin/product-list'))->with('success','ok');
            }else{
                return back()->withInput();
            }
        }else{
            return back()->withInput()->with('error','ok');
        }
    }

    public function productUpdate(Request $request){
        $product = Products::find($request->id);
        $product->product_name=$request->name;
        $product->categori=$request->categori;
        $product->product_price=$request->price;
        $product->product_info=$request->info;
        //resim isteği var değiştir
        if ($request->hasFile('img1')){
            $img1=uniqid().'.'.$request->img1->getClientOriginalExtension();
            $request->img1->move(public_path('frontend').'/img/product',$img1);
            $product->img1 = $img1;
        }
        if ($request->hasFile('img2')){
            $img2=uniqid().'.'.$request->img2->getClientOriginalExtension();
            $request->img2->move(public_path('frontend').'/img/product',$img2);
            $product->img2 = $img2;
        }
        if ($request->hasFile('img3')){
            $img3=uniqid().'.'.$request->img3->getClientOriginalExtension();
            $request->img3->move(public_path('frontend').'/img/product',$img3);
            $product->img3 = $img3;
        }
        if ($request->hasFile('img4')){
            $img4=uniqid().'.'.$request->img4->getClientOriginalExtension();
            $request->img4->move(public_path('frontend').'/img/product',$img4);
            $product->img4 = $img4;
        }
        $product->save();
        if ($product){
            return redirect(route('admin/product-list'))->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }

    public function productDelete($id){

        $product= Products::find($id);
        $action = $product->delete($id);
        if ($action){
           return redirect(route('admin/product-list'))->with('success','ok');
        }else{
           return redirect(route('admin/product-list'))->with('error','ok');
        }
    }
}
