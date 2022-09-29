@extends('frontend.layout')
@section('title','Sipariş Detay')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <section class="shopping-cart spad">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="shopping__cart__table">

                                            @if($orderStatusValue==1)
                                                <div class="alert alert-warning">
                                            <h5 style="text-align: center">
                                                Bu Sipariş Tedarik Ediliyor Tedarik Edildikten Sonra Kargoya Verilecektir Tedarik Süreci 1 ile 3 gün Arasındadır.
                                            </h5></div>
                                            @elseif($orderStatusValue==2)
                                                <div style="text-align: center;" class="alert alert-info"><h5>
                                                        Bu Sipariş Kargoda Kargo Şirketine Göre İletim Hızı Değişkenlik Gösterir Tahmini Süre 1 ile 4 Gündür</h5>
                                                </div>
                                            @elseif($orderStatusValue==3)
                                                <div style="text-align: center;" class="alert alert-success"><h5>
                                                        Bu Sipariş Başarılı Bir Şekilde Teslim Edilmiştir</h5>
                                                </div>
                                            @endif

                                        <table style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>Resim</th>
                                                <th>Ürün Adı</th>
                                                <th>Toplam Fiyat</th>
                                                <th>Adeti</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td class="product__cart__item__text">

                                                        <img width="100" src="{{asset('frontend')}}/img/product/{{$order->product->img1}}" alt="">

                                                </td>
                                                <td class="product__cart__item__text">
                                                    <h6>{{$order->product->product_name}}</h6>
                                                </td>
                                                <td class="cart__price"><h6>{{$order->product_price}}Tl</h6></td>
                                                <td class="cart__close"><h6>{{$order->product_count}} Adet</h6></td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>



                                    </div>

                                </div>
                                <div class="col-lg-12 mt-2">

                                    <div class="cart__total">

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="continue__btn">
                                                <a style="width: 100%;text-align: center;background-color: white" href="{{route('index')}}">Alışverişe Devam Et</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('css') @endsection
@section('js') @endsection
