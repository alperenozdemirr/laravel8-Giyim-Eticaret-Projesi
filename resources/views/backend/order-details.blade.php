@extends('backend.layout')
@section('title',"Sipariş Detay Sayfası")
@section('content')
    <div class="d-flex justify-content-center flex-nowrap mt-4">
<div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sipariş Detay Sayfası</h4>
            <p class="card-description">
                <a href="@if($orderStatusValue==1){{route('supplyOrders')}}@elseif($orderStatusValue==2){{route('cargoOrders')}}@elseif($orderStatusValue==3){{route('successOrders')}}@endif" class="btn btn-primary">Listeye Geri Dön</a>
            <div class="dropdown">
                @if($orderStatusValue==1)
                    <h5 style="text-align: center">
                        Tedarik Ediliyor
                    </h5>
                @elseif($orderStatusValue==2)
                    <div style="text-align: center;" class="alert alert-info"><h5>
                             Kargoda</h5>
                    </div>
                @elseif($orderStatusValue==3)
                    <div style="text-align: center;" class="alert alert-success"><h5>
                            Teslim Edilmiştir</h5>
                    </div>
                @endif<br>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Durum Seç
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{route('orderStatusUpdate',['id'=>$orderid,'value'=>1])}}">Tedarik Ediliyor</a></li>
                    <li><a class="dropdown-item" href="{{route('orderStatusUpdate',['id'=>$orderid,'value'=>2])}}">Kargoda</a></li>
                    <li><a class="dropdown-item" href="{{route('orderStatusUpdate',['id'=>$orderid,'value'=>3])}}">Teslim Edildi</a></li>
                </ul>
            </div>

            </p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Ürün Adı</th>
                        <th>Ürün Resmi</th>
                        <th>Kategori</th>
                        <th>Adet</th>
                        <th>Tutar</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->product->product_name}}</td>
                        <td><img width="50" src="{{asset('frontend')}}/img/product/{{$order->product->img1}}"></td>
                        <td>{{$order->product->categories->categori_name}}</td>
                        <td>{{$order->product_count}} Adet</td>
                        <td>{{$order->product_price}}TL</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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
