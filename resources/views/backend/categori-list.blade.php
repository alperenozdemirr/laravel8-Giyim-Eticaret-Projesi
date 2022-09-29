@extends('backend.layout')
@section('title',"Admin")
@section('content')
<div class="d-flex justify-content-center flex-nowrap mt-4">
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kategori Listesi</h4>
                <p class="card-description">
                    Kategoriler buradaki sırası gibi sıralanıyor.
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr style="text-align: center">
                            <th>liste-no</th>
                            <th>Kategori ismi</th>
                            <th>Sıra numarası</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $categori)
                        <tr style="text-align: center">
                            <td>{{$loop->iteration}}.</td>
                            <td>{{$categori->categori_name}}</td>
                            <td>{{$categori->categori_order}}</td>
                            <td><a href="categori-list/edit-code00{{$categori->id}}" class="btn btn-sm btn-success">Güncelle</a>
                                <a href="categori-list/delete-code00{{$categori->id}}" class="btn btn-sm btn-danger">Sil</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css') @endsection
@section('js') @endsection
