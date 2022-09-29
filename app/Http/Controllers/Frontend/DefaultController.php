<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
//use App\Http\Middleware\User;
use App\Mail\mailConfirm;
use App\Mail\newUser;
use App\Models\Baskets;
use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\Categories;
use App\Models\Sliders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DefaultController extends Controller
{
    public function index(){
        $sliders = Sliders::all();
        $banners = Banners::all();
        $categories = Categories::all();
        $products = Products::orderByDesc('id')->limit(4)->get();

        return view('frontend/default/index')
            ->with(compact('sliders'))
            ->with(compact('banners'))
            ->with(compact('categories'))
            ->with(compact('products'));
    }
    public function authenticate(Request $request){
        $request->flash();
        $request->only('email','password','remember_me');
        $email= $request->email;
        $password= $request->password;
        $type=1;
        $remember_me=$request->has('remember_me') ? true : false;


        if (Auth::attempt(['email'=>$email,'password'=>$password,'type'=>$type],$remember_me)){
            return redirect()->intended(route('index'));
        }else{
            return back()->withInput();
        }
    }
    public function userLogout(){
        Auth::logout();
        return redirect(route('user.login'))->with('logout','Güvenli Çıkış Sağlandı');
    }
    public function mailConfirmedPage(Request $request){
        $request->flash();
        $request->validate([
            'name'=>'required|min:5|max:255',
            'email'=>'email',
            'password'=>'min:8|max:255|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword'=>'min:8'
        ]);



        session(['name'=>$request->name]);
        session(['email'=>$request->email]);
        session(['password'=>$request->password]);
        return view('frontend.default.email-confirm');
    }
    public function getCode(){
        session(['randomCode'=>rand(111111,999999)]);
        Mail::to(session()->get('email'))->send(new mailConfirm());
        return view('frontend.default.email-confirm')->with('codeSuccess','Doğrulama Kodu Başarıyla Gönderilmiştir');
    }
    public function userRegister(Request $request){
        $code=$request->code;
        if (session()->get('randomCode')==$code){
            $user=new User();
            $user->name=session()->get('name');
            $user->email=session()->get('email');
            $user->password=bcrypt(session()->get('password'));
            $user->type=1;
            $user->save();
            if($user){
                Mail::to(session()->get('email'))->send(new newUser());
                session()->flush();
                return redirect(route('user.login'))->with('user.register','Başarıyla Üye Oldunuz Şimdi Giriş Yapabilirsiniz');
            }else{
                return redirect(route('user.register'));
            }
        }else{
            return redirect(route('user.register'));
        }


    }
    public function mailConfirmed(Request $request){
        $code=$request->code;
        if (session()->get('randomCode')==$code){

        }
    }
    //eski register
    /*public function userRegister(Request $request){
        // user modelinde düzenlemeler yapman gerekiyor
        //yeni model gerekebilir oluşturmamışım

        $request->flash();
        $request->validate([
            'name'=>'required|min:5|max:255',
            'email'=>'email',
            'password'=>'min:8|max:255|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword'=>'min:8'
        ]);

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->type=1;
        $user->save();
        if($user){
            Mail::to($request->email)->send(new newUser());
            return redirect(route('user.login'))->with('user.register','Başarıyla Üye Oldunuz Şimdi Giriş Yapabilirsiniz');
        }else{
            return back();
        }

    }*/
    public function countShopCart(){
        if(Auth::user()){
            $count = Baskets::where('user_id',Auth::user()->id)->count();
            return $count;
        }else{
         return 0;
        }

    }
    public function priceShopCart(){
        if(Auth::user()){
            $id=Auth::user()->id;
            $baskets=Baskets::where('user_id',$id)->get();
            $total=0;
            foreach ($baskets as $basket){
                $total+=$basket->products->product_price*$basket->product_count;
            }
            return $total;
        }else{
            return 0;
        }

    }

    public function myAccountPage(){
        $user=User::where('id',Auth::user()->id)->first();
        $id=Auth::user()->id;
        return view('frontend.my-account')
            ->with(compact('user'));
    }

    public function myAccountUpdate(Request $request){
        $user=User::find(Auth::user()->id);
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->posta=$request->posta;
        $user->city=$request->city;
        $user->save();
        if ($user){
            return redirect(route('user.myAccount'));
        }else{
            return redirect(route('user.myAccount'))->with('no','Bilgileri eksiksiz doldurduğunuzdan ve sözleşmeyi işaretlediğinizden emin olun');
        }
    }

    public function searchCategory($id){
        $products = Products::where('categori',$id)->paginate(10);
        return view('frontend.products')
            ->with(compact('products'))
            ->with('category','ok');
    }

    public function productSearch(Request $request){
        $search = $request->input('search');
        $products = Products::where('product_name','LIKE',"%$search%")->paginate(12);
        return view('frontend.products')
            ->with(compact('products'))
            ->with('search','ok');
    }
    public function productsShop(){
        $products = Products::orderByDesc('id')->paginate(10);
        return view('frontend.products')
            ->with(compact('products'))
            ->with('shop','ok');
    }
    public function productsFilter($min,$max){
        $products = Products::whereBetween('product_price',[$min,$max])->paginate(12);
        return view('frontend.products')
            ->with(compact('products'))
            ->with('productsFilter','ok');
    }

}
