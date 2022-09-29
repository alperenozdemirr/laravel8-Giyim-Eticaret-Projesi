@extends('frontend.layout')
@section('title','Bilgiler')
@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Hesap Bilgilerim</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('index')}}">Anasayfa</a>
                            <a href="{{route('user.myAccount')}}">Hesabım</a>
                            <span>Hesap Bilgilerim</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{route('user.myAccountUpdate')}}" method="POST">
                    @CSRF
                    <div class="row">
                        <div class="col-lg-12 col-md-6">

                            <h6 class="checkout__title">Hesap Bilgilerim</h6>
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
                            <button type="submit"  class="site-btn col-md-12">Bilgilerimi Güncelle</button>



                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('css') @endsection
@section('js') @endsection
