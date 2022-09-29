<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function productDetails($id){
        $product = Products::find($id);
        return view('frontend.product-details')
            ->with(compact('product'));
    }
}
