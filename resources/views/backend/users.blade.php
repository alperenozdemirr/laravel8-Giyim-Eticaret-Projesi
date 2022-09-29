@extends('backend.layout')
@section('title',"Kullanıcı Listesi")
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tüm Kullanıcıların Listesi</h4>
                <p class="card-description">

                </p>
                <div class="table-responsive">
                    <table style="text-align: center;" class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Adı Soyadı</th>
                            <th>Email</th>
                            <th>Adresi</th>
                            <th>Telefon</th>
                            <th>Posta Kodu</th>
                            <th>Sehir</th>
                            <th>Durum</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->posta}}</td>
                            <td>{{$user->city}}</td>
                            <td></td>
                            <td>
                                <a href="{{route('userDelete',$user->id)}}" class="btn btn-xs btn-danger">Sil</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center flex-nowrap mt-4">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css') @endsection
@section('js') @endsection
