@extends('backend.layout')
@section('title',"Admin")
@section('content')
    <div class="d-flex justify-content-center flex-nowrap mt-4">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kategori Güncelleme Sayfası</h4>
                <p class="card-description">
                    Bu sayfada kategori ismi ve sırası değiştirilir<br>
                    Kategori sırası ne işe yarar?<br>
                    Kategorinin listelendiği yerlerde numara sırasına göre sıralanır.
                </p>
                <form method="POST" action="{{route('admin.categoriUpdate')}}" class="forms-sample">
                    @CSRF
                    <input type="hidden" name="id" value="{{$categories->id}}">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Kategori İsmi</label>
                        <input type="text" class="form-control" name="name" value="{{$categories->categori_name}}" id="exampleInputUsername1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Sıra numarası</label>
                        <input type="number" class="form-control" name="order" value="{{$categories->categori_order}}" id="exampleInputUsername1">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Güncelle</button>
                    <a href="{{route('admin.categoriList')}}" class="btn btn-light">İptal</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('css') @endsection
@section('js') @endsection
