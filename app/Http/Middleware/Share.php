<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Baskets;
//use Illuminate\View\View;

//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
//use App\Http\Controllers\Controller;

class Share
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        $data['categories']=Categories::orderBy('categori_order')->get();
        View::share('data',$data);
        return $next($request);
    }
}
