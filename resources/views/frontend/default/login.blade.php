@extends('frontend.layout')
@section('title',"Login")
@section('content')
    <div class="d-flex justify-content-center flex-nowrap mt-5 mb-5">
    <div class="col-lg-4 grid-margin stretch-card mt-5 mb-5">

            @if(@session('user.register'))<p style="color: darkgreen" class="d-flex justify-content-center">Durum: {{session('user.register')}}</p>@endif
    <form method="POST" action="{{route('index.authenticate')}}">
        @CSRF
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" name="remember_me" for="exampleCheck1">Beni Hatırla</label>
        </div>
        @if(@session('logout'))<p class="d-flex justify-content-center">{{session('logout')}}</p>@endif
        <button type="submit" class="btn col-12 btn-dark">Giriş Yap</button>
    </form>
        <a style="color:black;" class="d-flex justify-content-center mt-4" href="{{route('user.register')}}">Hala Üye Değilmisin?</a>
    </div>
    </div>
@endsection
@section('css') @endsection
@section('js') @endsection
