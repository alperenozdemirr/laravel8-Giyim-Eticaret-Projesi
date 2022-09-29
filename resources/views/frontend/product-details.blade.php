@extends('frontend.layout')
@section('title',$product->product_name)
@section('content')
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="./index.html">Anasayfa</a>
                            <a href="./shop.html">Ürünler</a>
                            <span>Ürün Detay</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{asset('frontend')}}/img/product/{{$product->img1}}" style="background-image: url(&quot;img/shop-details/thumb-1.png&quot;);">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{asset('frontend')}}/img/product/{{$product->img2}}" style="background-image: url(&quot;img/shop-details/thumb-2.png&quot;);">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{asset('frontend')}}/img/product/{{$product->img3}}" style="background-image: url(&quot;img/shop-details/thumb-3.png&quot;);">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{asset('frontend')}}/img/product/{{$product->img4}}" style="background-image: url(&quot;img/shop-details/thumb-4.png&quot;);">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{asset('frontend')}}/img/product/{{$product->img1}}" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{asset('frontend')}}/img/product/{{$product->img2}}" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{asset('frontend')}}/img/product/{{$product->img3}}" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-4" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{asset('frontend')}}/img/product/{{$product->img4}}" alt="">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{$product->product_name}}</h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span> - 5 Reviews</span>
                            </div>
                            <h3>{{$product->product_price}}TL <span>{{$product->product_price}}TL</span></h3>
                            <p>{{$product->product_info}}</p>
                            <div class="product__details__cart__option">
                                <form method="POST" action="{{route('user.AddCart')}}">
                                    @CSRF
                                <div class="quantity">
                                    <div class="pro-qty"><span class="fa fa-angle-up dec qtybtn"></span>
                                        <input type="number" name="product_count" value="1">
                                        <span class="fa fa-angle-down inc qtybtn"></span></div>
                                </div>

                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button  type="submit" class="primary-btn">Sepete Ekle</button>

                                </form>
                            </div>

                            <div class="product__details__last__option">
                                <h5><span>Garantili Güvenli Ödeme</span></h5>
                                <img src="{{asset('frontend')}}/img/shop-details/details-payment.png" alt="">
                                <ul>
                                    <li><span>Kategorisi:</span>{{$product->categories->categori_name}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Açıklama</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <h5>Ürün Açıklaması</h5>
                                            <p>{{$product->product_info}}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related spad">
        <div class="container mb-4">

        </div>
    </section>
@endsection
@section('css') @endsection
@section('js') @endsection
