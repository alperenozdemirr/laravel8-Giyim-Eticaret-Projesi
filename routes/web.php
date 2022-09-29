<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\DefaultController;
use App\Http\Controllers\Backend\ProductEditConttroller;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Frontend\ShoppingCartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrdersController;
use App\Http\Controllers\Backend\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Auth::routes(['verify'=>true]);
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth','verify')->name('verification.notice');*/
Route::get('/',[App\Http\Controllers\Frontend\DefaultController::class,'index'])->name('index');
Route::get('user/login',function (){
    return view('frontend.default.login');
})->name('user.login');
Route::get('deneme',function (){
    return view('mail.newUser');
});
Route::post('mail-confirmed',[DefaultController::class,'mailConfirmedPage'])->name('mail.confirmedPage');
Route::post('double-authentication',[DefaultController::class,'mailConfirmed'])->name('mail.confirmed');
Route::get('two-mail-confirm',[DefaultController::class,'getCode'])->name('mail.getCode');
Route::middleware(['user'])->group(function (){
    Route::get('shopping-cart',[ShoppingCartController::class,'index'])->name('user.shoppingCart');
    Route::post('addShoppingCart',[ShoppingCartController::class,'addCart'])->name('user.AddCart');

    Route::get('addCartCount/product-code-00{id}',[ShoppingCartController::class,'addCartCount']);
    Route::get('sourCartCount/product-code-00{id}',[ShoppingCartController::class,'sourCartCount']);
    Route::get('removeCart/product-code-00{id}',[ShoppingCartController::class,'removeCart']);
    Route::get('checkout',[CheckoutController::class,'index'])->name('index.checkout');
    Route::post('checkoutConfirm',[CheckoutController::class,'checkoutConfirm'])->name('checkoutConfirm');
    Route::get('payment',[CheckoutController::class,'payment'])->name('payment');
    Route::get('newOrder',[CheckoutController::class,'newOrder'])->name('user.newOrder');
    Route::get('my-order',[OrdersController::class,'index'])->name('user.myOrder');
    Route::get('my-order/details-code{id}00',[OrdersController::class,'orderDetails']);
    Route::get('my-account',[DefaultController::class,'myAccountPage'])->name('user.myAccount');
    Route::post('myAccountPost',[DefaultController::class,'myAccountUpdate'])->name('user.myAccountUpdate');

});
//Kategori İsteği
Route::get('product/categories/00{id}',[DefaultController::class,'searchCategory'])->name('categories','id');
Route::get('product/product-filter-min={min}-max={max}',[DefaultController::class,'productsFilter'])->name('productsFilter',['min','max']);
Route::get('product-details/product-code-00{id}',[ProductController::class,'productDetails'])->name('productDetails','id');
Route::get('product/',[DefaultController::class,'productSearch'])->name('productSearch');
Route::get('shop',[DefaultController::class,'productsShop'])->name('productsShop');
Route::get('user/register',function (){
    return view('frontend.default.register');
})->name('user.register');
Route::post('user/login',[DefaultController::class,'authenticate'])->name('index.authenticate');
Route::get('user/logout',[DefaultController::class,'userLogout'])->name('user.logout');
Route::post('user/register',[DefaultController::class,'userRegister'])->name('user.registerPost');

// ADMİN ROUTE ---------------------------
Route::post('admin/login',[\App\Http\Controllers\Backend\DefaultController::class,'authenticate'])->name('admin.authenticate');
Route::get('admin/login',[\App\Http\Controllers\Backend\DefaultController::class,'loginPage'])->name('admin.loginPage');
Route::get('admin/logout',[\App\Http\Controllers\Backend\DefaultController::class,'adminLogout'])->name('adminLogout');
Route::middleware(['admin'])->group(function (){
Route::get('admin/index',[App\Http\Controllers\Backend\DefaultController::class,'index'])->name('admin.index');

Route::get('admin/product-list',[ProductEditConttroller::class,'productList'])->name('admin/product-list');

Route::get('admin/product-edit/product-code-00{id}',[ProductEditConttroller::class,'productEditPage']);
Route::get('admin/product-new',[ProductEditConttroller::class,'productNew'])->name('admin.newProduct');
Route::post('admin/product-newPost',[ProductEditConttroller::class,'productNewPost'])->name('admin.productNewPost');
Route::get('admin/product-delete/product-code-00{id}',[ProductEditConttroller::class,'productDelete']);
Route::post('admin/product-update',[ProductEditConttroller::class,'productUpdate'])->name('admin.productUpdate');
Route::get('admin/categori-list',[CategoriesController::class,'categoriList'])->name('admin.categoriList');
Route::get('admin/categori-list/edit-code00{id}',[CategoriesController::class,'categoriUpdatePage']);
Route::get('admin/categori-list/delete-code00{id}',[CategoriesController::class,'categoriDelete']);
Route::post('admin/categori-Update',[CategoriesController::class,'categoriUpdate'])->name('admin.categoriUpdate');
Route::get('admin/categories/new-category',[CategoriesController::class,'categoriNewPage'])->name('admin.categoriNewPage');
Route::post('admin/categories/new-category-post',[CategoriesController::class,'categoriNew'])->name('admin.newCategoryPost');
Route::get('admin/all-orders',[OrderController::class,'allOrders'])->name('allOrders');
Route::get('admin/supply-orders',[OrderController::class,'supplyOrders'])->name('supplyOrders');
Route::get('admin/cargo-orders',[OrderController::class,'cargoOrders'])->name('cargoOrders');
Route::get('admin/success-orders',[OrderController::class,'successOrders'])->name('successOrders');
Route::get('admin/order/details-code{id}00',[OrderController::class,'orderDetails'])->name('orderDetails','id');
Route::get('admin/order/status-code{id}-value{value}',[OrderController::class,'orderStatusUpdate'])->name('orderStatusUpdate',['id','value']);
Route::get('admin/users',[\App\Http\Controllers\Backend\DefaultController::class,'userList'])->name('userList');
Route::get('admin/user-delete{id}',[\App\Http\Controllers\Backend\DefaultController::class,'userDelete'])->name('userDelete','id');
Route::get('admin/settings',[\App\Http\Controllers\Backend\DefaultController::class,'settings'])->name('settingsPage');
Route::post('admin/settingsUpdate',[\App\Http\Controllers\Backend\DefaultController::class,'settingsUpdate'])->name('settingsUpdate');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
