@extends('frontend.layout')
@section('title','Ödeme işlemi')
@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Ödeme İşlemi</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('index')}}">Anasayfa</a>
                            <a href="{{route('user.shoppingCart')}}">Sepet</a>
                            <a>Ödeme İşlemi</a>
                            <span>Ödeme İşlemi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">


                    <div class="row">
                        <div class="col-md-12">

                            <h6 class="checkout__title">Ödeme İşlemi</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Kart Numarası</p>
                                        <input disabled value="1245 6789 0123 12378" type="text">
                                    </div>
                                </div>

                            </div>
                            <div class="checkout__input">
                                <p>Kart İsmi<span>*</span></p>
                                <input value="Alp Eren" disabled type="text">
                            </div>
                            <div class="checkout__input">
                                <p>CV<span>*</span></p>
                                <input disabled value="011" type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Son Kullanma Tarihi<span>*</span></p>
                                <input disabled value="22/10"  type="text">
                            </div>




                            <a href="{{route('user.newOrder')}}" class="site-btn col-md-12">Ödemeyi Onayla</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('css') @endsection
@section('js') @endsection
