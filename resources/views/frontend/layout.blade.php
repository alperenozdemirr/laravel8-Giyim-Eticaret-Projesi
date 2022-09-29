<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <style>
        #searchPage{
            position: fixed;
            z-index: 9999999;
            width:100%;
            height:100vh;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #searchClose{
            width:50px;
            height: 50px;
            border-radius: 50%;
            position:fixed;
            top:20px;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor:pointer;
        }
        #searchİnput{
            width:250px;
            height:45px;
            font-size: 22px;
            font-family: sans-serif;
            text-align: center;
        }
        #buttonSearch{
            width:60px;
            height:60px;
            background-color: white;
            border-radius: 50%;
        }

    </style>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->

<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            @if(\Illuminate\Support\Facades\Auth::user())
               <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                <br>
                <a style="color:black;" href="{{route('user.logout')}}">Çıkış</a>
                @else
            <a href="{{route('user.login')}}">Giriş Yap</a>
            <a href="{{route('user.register')}}">Üye Ol</a>
            @endif
        </div>
        <div class="offcanvas__top__hover">
            <span>TR<i class="arrow_carrot-down"></i></span>
            <ul>
                <li>TR</li>
            </ul>
        </div>
    </div>
    <div class="offcanvas__nav__option">
        <a href="#" class="search-switch"><img src="{{asset('frontend')}}/img/icon/search.png" alt=""></a>
        <a href="{{route('user.shoppingCart')}}"><img src="{{asset('frontend')}}/img/icon/cart.png" alt="">
            <span>{{\App\Http\Controllers\Frontend\DefaultController::countShopCart()}}</span></a>
        <div class="price">{{\App\Http\Controllers\Frontend\DefaultController::priceShopCart()}}TL</div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">

    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">

                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            @if(\Illuminate\Support\Facades\Auth::user())

                                <div class="header__top__hover">
                                    <span>Hesabım<i class="arrow_carrot-down"></i></span>
                                    <ul>
                                        <li><a style="color:black;" href="{{route('user.myAccount')}}"> Hesabım</a></li>
                                        <li><a style="color:black;" href="{{route('user.myOrder')}}">Siparişlerim</a></li>
                                        <li><a style="color:black;" href="{{route('user.logout')}}">Çıkış</a></li>
                                    </ul>
                                </div>
                            @else
                                <a href="{{route('user.login')}}">Giriş Yap</a>
                                <a>|</a>
                                <a href="{{route('user.register')}}">Üye Ol</a>
                            @endif

                        </div>

                        <div class="header__top__hover">
                            <span>TR<i class="arrow_carrot-down"></i></span>
                            <ul>
                                <li>TR</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{route('index')}}"><img src="{{asset('frontend')}}/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{route('index')}}">Anasayfa</a></li>
                        <li><a href="{{route('productsShop')}}">Ürünler</a></li>
                        <li><a href="#">Kategoriler</a>
                            <ul class="dropdown">
                                @foreach($data['categories'] as $categori)
                                    <li><a href="{{route('categories',$categori->id)}}">{{$categori->categori_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li><a href="{{route('index')}}">İletişim</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="{{asset('frontend')}}/img/icon/search.png" alt=""></a>
                    <a href="{{route('user.shoppingCart')}}"><img src="{{asset('frontend')}}/img/icon/cart.png" alt="">
                        <span style="color: orangered;">{{\App\Http\Controllers\Frontend\DefaultController::countShopCart()}}</span></a>
                    <div class="price">{{\App\Http\Controllers\Frontend\DefaultController::priceShopCart()}}TL</div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->


@yield('content')


<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="../../../public/frontend/img/footer-logo.png" alt=""></a>
                    </div>
                    <p>NOT! Bu Site test için yayınlanmıştır hiçbir kötü amaçlı yapılmamıştır.</p>
                    <a href="#"><img src="../../../public/frontend/img/payment.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Kategoriler</h6>
                    <ul>
                        @foreach($data['categories'] as $categori)
                            <li><a href="{{route('categories',$categori->id)}}">{{$categori->categori_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Ürün Çeşitleri</h6>
                    <ul>
                        @foreach($data['categories'] as $categori)
                            <li><a href="{{route('categories',$categori->id)}}">{{$categori->categori_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>Yeni ürünlerden haberdar ol</h6>
                    <div class="footer__newslatter">
                        <p>NOT! Bu Site test için yayınlanmıştır hiçbir kötü amaçlı yapılmamıştır.</p>
                        <form action="#">
                            <input type="text" placeholder="mail adresin">
                            <button type="submit"><span class="icon_mail_alt"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer__copyright__text">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <p>Copyright © OZDEMİR SOFTWARE
                        <script>
                            document.write(new Date().getFullYear());
                        </script>

                    </p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form method="GET" action="{{route('productSearch')}}" class="search-model-form">
            <input type="text" name="search" id="search-input" placeholder="Ürün Ara.....">
            <button type="submit" id="buttonSearch"><img src="{{asset('frontend')}}/img/icon/search.png" alt=""></button>
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script>document.getElementById("headerSearch").onclick = function (){
        alert("hello");
    };</script>
<script src="{{asset('frontend')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.nice-select.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.nicescroll.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.countdown.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.slicknav.js"></script>
<script src="{{asset('frontend')}}/js/mixitup.min.js"></script>
<script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/js/main.js"></script>
</body>

</html>
