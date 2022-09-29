@extends('frontend.layout')
@section('title',"Sepetim")
@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Alışveriş Sepeti</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('index')}}">Anasayfa</a>
                            <a href="shopping-cart">Alışveriş Sepeti</a>
                            <span>Sepetim</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        @if(\App\Http\Controllers\Frontend\DefaultController::countShopCart() > 0)
                        <table>
                            <thead>
                            <tr>
                                <th>Ürün</th>
                                <th>Adet</th>
                                <th>Toplam Fiyat</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($baskets as $basket)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img width="100" src="{{asset('frontend')}}/img/product/{{$basket->products->img1}}" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{$basket->products->product_name}}</h6>
                                        <h5>{{$basket->products->product_price}}TL</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="sourCartCount/product-code-00{{$basket->id}}" aria-label="Previous">
                                                        <span style="color:black" aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link">{{$basket->product_count}}</a></li>

                                                <li class="page-item">
                                                    <a class="page-link" href="addCartCount/product-code-00{{$basket->id}}" aria-label="Next">
                                                        <span style="color:black" aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </td>
                                <td class="cart__price">{{$basket->products->product_price*$basket->product_count}}TL</td>
                                <td class="cart__close"><a href="removeCart/product-code-00{{$basket->id}}}"> <i class="fa fa-close"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="continue__btn">
                                <a style="width: 100%;text-align: center;background-color: black;color: white;" href="{{route('productsShop')}}">Alışverişe Devam Et</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div  class="cart__discount">
                        <h6>İndirim Kodu</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Uygula</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Sipariş Özeti</h6>
                        <ul>
                            <li>Tutar <span>{{$total}}TL</span></li>
                            <li>Kargo Dahil Toplam Tutar <span>{{$total}}TL</span></li>
                        </ul>
                        <a href="{{route('index.checkout')}}" class="primary-btn">Alışverişi Tamamla</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @if(\App\Http\Controllers\Frontend\DefaultController::countShopCart()==0)
        <div style="width: 100%" class="alert alert-primary" role="alert">
            <h5 style="text-align: center">
                Sepetinizde ürün bulunmamaktadır ürün eklemek için <a href="{{route('productsShop')}}">tıklayınız</a>
            </h5>
        </div>
        @endif
    </section>
@endsection
@section('css') @endsection
@section('js') @endsection
