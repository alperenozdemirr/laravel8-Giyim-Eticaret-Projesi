<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
class CategoriesController extends Controller
{
    public function categoriList(){
        $categories = Categories::orderBy('categori_order')->get();
        return view('backend.categori-list')
            ->with(compact('categories'));
    }
    public function categoriUpdatePage($id){
        $categories = Categories::find($id);
        return view('backend.categori-update')->with(compact('categories'));
    }
    public function categoriNewPage(){
        return view('backend.categori-new');
    }
    public function categoriNew(Request $request){
        $categories= new Categories();
        $categories->categori_name=$request->name;
        $categories->categori_order=$request->order;
        $categories->save();
        if ($categories){
            return redirect(route('admin.categoriList'))
                ->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }
    public function categoriUpdate(Request $request){
        $categori = Categories::find($request->id);
        $categori->categori_name= $request->name;
        $categori->categori_order = $request->order;
        $categori->save();
        if ($categori){
           return redirect(route('admin.categoriList'))->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }
    public function categoriDelete($id){
        $categori = Categories::find($id);
        $action = $categori->delete($id);

        if ($action){
            return redirect(route('admin.categoriList'))->with('success','ok');
        }else{
            return back()->withInput()->with('error','ok');
        }
    }
}
