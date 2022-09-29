<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index(){
        return view('backend.default.index');
    }
    public function userList(){
        $users=User::paginate(10);
        return view('backend.users')->with(compact('users'));

    }
    public function userDelete($id){
        $user=User::where('id',$id)->delete();
        if($user){
            return redirect(route('userList'))->with('success','ok');
        }else{
            return redirect(route('userList'))->with('error','ok');
        }
    }

    public function settings(){
        $settings = Settings::where('id',1)->first();
        return view('backend.site-settings')->with(compact('settings'));
    }
    public function settingsUpdate(Request $request){
        $settings= Settings::find(1);
        if ($request->hasFile('logo')){
            $logo=uniqid().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('frontend').'/img/',$logo);
            $settings->logo = $logo;

        }
        $settings->save();
        if ($settings){
            return redirect(route('settingsPage'))->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }

    public function loginPage(){
        return view('backend.default.login');
    }

    public function authenticate(Request $request){
        $request->flash();
        $request->only('email','password','remember_me');
        $email= $request->email;
        $password= $request->password;
        $type=5;
        $remember_me=$request->has('remember_me') ? true : false;


        if (Auth::attempt(['email'=>$email,'password'=>$password,'type'=>$type],$remember_me)){
            return redirect()->intended(route('admin.index'));
        }else{
            return back()->withInput()->with('error','Bilgilerinizi Tekrar Kontrol Edin Admin Yetkiniz Oldundan Emin Olun!');
        }
    }
    public function adminLogout(){
        Auth::logout();
        return redirect(route('admin.loginPage'))->with('logout','Güvenli Çıkış Sağlandı');
    }
}
