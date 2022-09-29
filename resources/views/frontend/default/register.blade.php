@extends('frontend.layout')
@section('title',"Register")
@section('content')
    <div class="d-flex justify-content-center flex-nowrap mt-5 mb-5">
        <div class="col-lg-4 grid-margin stretch-card mt-5 mb-5">
            <form action="{{route('mail.confirmedPage')}}" method="POST">
                @CSRF
                <div class="form-group">
                    <label for="exampleInputEmail1">Adınız Soyadınız</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adınız Soyadınız">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Adresi</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Adresiniz">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Şifre</label>
                    <input type="password" class="form-control" name="password"  id="exampleInputPassword1" placeholder="Şifre">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tekrar Şifre</label>
                    <input type="password" class="form-control" name="confirmPassword"  id="exampleInputPassword1" placeholder="Tekrar Şifre">
                </div>


                <button type="submit" class="btn col-12 btn-dark">Kayıt Ol</button>
            </form>
        </div>
    </div>
@endsection
@section('css') @endsection
@section('js') @endsection
