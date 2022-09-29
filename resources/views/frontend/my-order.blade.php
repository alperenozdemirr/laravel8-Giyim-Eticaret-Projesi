@extends('frontend.layout')
@section('title','Siparişlerim')
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
                                        <div class="alert alert-warning" role="alert">
                                            <h5 style="text-align: center">
                                                Tedarik Edilen Siparişleriniz
                                            </h5>
                                        </div>
                                        <table style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>Tarih</th>
                                                <th>Sipariş Özeti</th>
                                                <th>Alıcı</th>
                                                <th>Toplam Tutal</th>
                                                <th>Detay</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders1 as $order1)
                                            <tr>
                                                <td class="product__cart__item">
                                                    <div class="product__cart__item__text">
                                                        <h6>{{$order1->time}}</h6>
                                                    </div>
                                                </td>
                                                <td class="quantity__item">
                                                    <h6>{{$order1->product_total_count}} Adet Ürün</h6>
                                                </td>
                                                <td class="cart__price"><h6>{{$order1->users->name}}</h6></td>
                                                <td class="cart__close"><h6>{{$order1->total_price}}TL</h6></td>
                                                <td><a class="btn btn-dark" href="my-order/details-code{{$order1->id}}00">Sipariş Detay</a> </td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                        @if(count($orders1)==0)
                                            <div style="text-align: center;" class="alert alert-primary">  <h4>Bu Tipte Siparişiniz Bulunmamaktadır.</h4>
                                            </div>
                                        @endif
                                        <div class="alert alert-primary" role="alert">
                                            <h5 style="text-align: center">
                                                Kargodaki Siparişleriniz
                                            </h5>
                                        </div>
                                        <table style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>Tarih</th>
                                                <th>Sipariş Özeti</th>
                                                <th>Alıcı</th>
                                                <th>Toplam Tutal</th>
                                                <th>Detay</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders2 as $order2)
                                            <tr>
                                                <td class="product__cart__item">
                                                    <div class="product__cart__item__text">
                                                        <h6>2022-05-09 21:12:49</h6>

                                                    </div>
                                                </td>
                                                <td class="quantity__item">
                                                    <h6>5 Adet Ürün</h6>
                                                </td>
                                                <td class="cart__price"><h6>Berke Can Görgülüarslan</h6></td>
                                                <td class="cart__close"><h6>45827.00TL</h6></td>
                                                <td><a class="btn btn-dark" href="my-order/details-code{{$order2->id}}00">Sipariş Detay</a> </td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                        @if(count($orders2)==0)
                                            <div style="text-align: center;" class="alert alert-primary">  <h4>Bu Tipte Siparişiniz Bulunmamaktadır.</h4>
                                            </div>
                                        @endif
                                        <div class="alert alert-success" role="alert">
                                            <h5 style="text-align: center">
                                                Teslim Edilmiş Siparişleriniz
                                            </h5>
                                        </div>
                                        <table style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>Tarih</th>
                                                <th>Sipariş Özeti</th>
                                                <th>Alıcı</th>
                                                <th>Toplam Tutal</th>
                                                <th>Detay</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders3 as $order3)
                                            <tr>
                                                <td class="product__cart__item">
                                                    <div class="product__cart__item__text">
                                                        <h6>2022-05-09 21:12:49</h6>

                                                    </div>
                                                </td>
                                                <td class="quantity__item">
                                                    <h6>5 Adet Ürün</h6>
                                                </td>
                                                <td class="cart__price"><h6>Berke Can Görgülüarslan</h6></td>
                                                <td class="cart__close"><h6>45827.00TL</h6></td>
                                                <td><a class="btn btn-dark" href="my-order/details-code{{$order3->id}}00">Sipariş Detay</a> </td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                        @if(count($orders3)==0)
                                            <div style="text-align: center;" class="alert alert-primary">  <h4>Bu Tipte Siparişiniz Bulunmamaktadır.</h4>
                                            </div>
                                        @endif
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
