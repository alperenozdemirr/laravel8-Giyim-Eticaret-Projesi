@extends('frontend.layout')
@section('title','Bilgiler')
@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Sipariş Bilgi İşlemleri</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('index')}}">Anasayfa</a>
                            <a href="{{route('user.shoppingCart')}}">Sepet</a>
                            <span>Sipariş Bilgi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{route('checkoutConfirm')}}" method="POST">
                    @CSRF
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span>Şuanlık Kupon Kullanılmamaktadır</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Fist Name</p>
                                        <input disabled value="{{$user->name}}" type="text">
                                    </div>
                                </div>

                            </div>
                            <div class="checkout__input">
                                <p>Telefon Numarası<span>*</span></p>
                                <input name="phone" value="{{$user->phone}}" type="number">
                            </div>
                            <div class="checkout__input">
                                <p>Adres<span>*</span></p>
                                <textarea name="address" class="col-lg-12" rows="5" >{{$user->address}}</textarea>
                            </div>
                            <div class="checkout__input">
                                <p>Posta Kodu<span>*</span></p>
                                <input name="posta" value="{{$user->posta}}" type="number">
                            </div>
                            <div class="checkout__input">
                                <p>Şehir Plaka<span>*</span></p>
                                <input name="city" value="{{$user->city}}" type="number">
                            </div>




                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Sipariş Ürünlerim</h4>
                                <div class="checkout__order__products">Ürün <span>Adet&Tutar</span></div>
                                <ul class="checkout__total__products">
                                    @foreach($baskets as $basket)
                                    <li>{{$loop->iteration}} - {{$basket->products->product_name}}<span>{{$basket->product_count}} X {{$basket->products->product_price}}TL = {{$basket->product_count*$basket->products->product_price}}TL</span></li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Tutar <span>{{$total}}TL</span></li>
                                    <li>Toplam Tutar Kargo Dahil <span>{{$total}}TL</span></li>
                                </ul>

                                <p></p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Sözleşmeyi Kabul Ediyorum
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <button type="submit" class="site-btn">Ödemeye Geç</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('css') @endsection
@section('js') @endsection
