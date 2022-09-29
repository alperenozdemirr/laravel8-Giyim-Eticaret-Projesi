@extends('frontend.layout')
@section('title',"Anasayfa")
@section('content')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        @foreach($sliders as $slider)
        <div class="hero__items set-bg" data-setbg="{{asset('frontend')}}/img/slider/{{$slider->image}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>{{$slider->title}}</h6>
                            <h2>{{$slider->name}}</h2>
                            <p>{{$slider->info}}</p>
                            <a href="{{$slider->url}}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<section class="banner spad">
    <div class="container">
        <div class="row">
            @foreach($banners as $banner)
            <div class="{{$banner->default_column}}">
                <div class="banner__item">
                    <div class="banner__item__pic">
                        <img src="{{asset('frontend')}}/img/banner/{{$banner->image}}" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>{{$banner->name}}</h2>
                        <a href="{{$banner->url}}">İncele</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li><a href="{{route('productsShop')}}">Tüm Ürünler</a></li>
                    <li class="active" data-filter=".new-arrivals">Son Eklenen 4 Ürün</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('frontend')}}//img/product/{{$product->img1}}">
                        <span class="label">Ücretsiz Kargo</span>
                        <ul class="product__hover">
                            <li><a href="product-details/product-code-00{{$product->id}}"><img src="{{asset('frontend')}}/img/icon/search.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$product->product_name}}</h6>
                        <a href="product-details/product-code-00{{$product->id}}" class="add-cart">+ Ürünü İncele</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>{{$product->product_price}}TL</h5>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- Product Section End -->





@endsection
@section('css') @endsection
@section('js') @endsection
