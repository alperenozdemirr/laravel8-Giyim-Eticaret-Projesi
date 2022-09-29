@extends('backend.layout')
@section('title',"Ürün Listesi")
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tüm Ürünlerin Listesi</h4>
            <p class="card-description">

            </p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Ürün Adı</th>
                        <th>Slider 1<br>(Kapak)</th>
                        <th>Slider 2</th>
                        <th>Slider 3</th>
                        <th>Slider 4</th>
                        <th>Kategori</th>
                        <th>Fiyatı</th>
                        <th>Açıklama</th>
                        <th>Düzenle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{substr($product->product_name,0,60)}}..</td>
                        <td><img width="50" src="{{asset('frontend')}}/img/product/{{$product->img1}}"></td>
                        <td><img width="50" src="{{asset('frontend')}}/img/product/{{$product->img2}}"></td>
                        <td><img width="50" src="{{asset('frontend')}}/img/product/{{$product->img3}}"></td>
                        <td><img width="50" src="{{asset('frontend')}}/img/product/{{$product->img4}}"></td>
                        <td>{{$product->categories->categori_name}}</td>
                        <td>{{$product->product_price}}TL</td>
                        <td>{{substr($product->product_info,0,30)}}...</td>
                        <td>
                            <a href="product-edit/product-code-00{{$product->id}}" class="btn btn-xs btn-success">Detay&Güncelle</a>
                            <a href="product-delete/product-code-00{{$product->id}}" class="btn btn-xs btn-danger">Sil</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center flex-nowrap mt-4">
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>
    @if(session('delete'))
    <script>alertify.success('Ürün Silindi');</script>
    @endif
@endsection
@section('css') @endsection
@section('js') @endsection
