@extends('frontend.layout')
@section('title','Tüm Ürünler')
@section('content')
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form method="GET" action="{{route('productSearch')}}">
                                <input type="text" name="search" placeholder="Ara...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Kategoriler</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll" tabindex="1" style="overflow-y: hidden; outline: none;">
                                                    @foreach($data['categories'] as $categori)
                                                        <li><a href="{{route('categories',$categori->id)}}">{{$categori->categori_name}}</a></li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Fiyat Filtrele</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="{{route('productsFilter',['min'=>'0','max'=>'250'])}}">0.00TL - 250.00TL</a></li>
                                                    <li><a href="{{route('productsFilter',['min'=>'250','max'=>'450'])}}">250.00TL - 450.00TL</a></li>
                                                    <li><a href="{{route('productsFilter',['min'=>'450','max'=>'850'])}}">450.00TL - 850.00TL</a></li>
                                                    <li><a href="{{route('productsFilter',['min'=>'850','max'=>'1500'])}}">850.00TL - 1500.00TL</a></li>
                                                    <li><a href="{{route('productsFilter',['min'=>'1500','max'=>'100000'])}}">1500.00TL+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">

                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset('frontend')}}//img/product/{{$product->img1}}">
                                    <span class="label">Ücretsiz Kargo</span>
                                    <ul class="product__hover">
                                        <li><a href="product-details/product-code-00{{$product->id}}"><img src="{{asset('frontend')}}/img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{$product->product_name}}</h6>
                                    <a href="{{route('productDetails',$product->id)}}" class="add-cart">+ Ürünü İncele</a>
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

                    <div class="row">
                        <div class="col-lg-12">
                        <div class="d-flex justify-content-center flex-nowrap mt-4">

                                {{$products->links()}}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('css') @endsection
@section('js') @endsection
