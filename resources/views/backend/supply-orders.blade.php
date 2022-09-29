@extends('backend.layout')
@section('title',"Tüm Sipariş Listesi")
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tedarik Edilen Siparişlerin Listesi</h4>
                <p class="card-description">

                </p>
                <div class="table-responsive">
                    <table style="text-align: center;" class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Adı Soyadı</th>
                            <th>Adresi</th>
                            <th>Posta Kodu</th>
                            <th>Sehir</th>
                            <th>Toplam Ürün Adet Sayısı</th>
                            <th>Ödenene Toplam Tutar</th>
                            <th>Sipariş Durumu</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->users->name}}</td>
                            <td>{{$order->users->address}}</td>
                            <td>{{$order->users->posta}}</td>
                            <td>{{$order->users->city}}</td>
                            <td>{{$order->product_total_count}}</td>
                            <td>{{$order->total_price}}TL</td>
                            <td>
                                @if($order->order_status==1)
                                <a class="btn btn-warning btn-xs disabled">Tedarik Ediliyor</a>
                                @elseif($order->order_status==2)
                                <a class="btn btn-primary btn-xs disabled"> Kargoda </a>
                                @elseif($order->order_status==3)
                                <a class="btn btn-success btn-xs disabled">Teslim Edildi</a>
                                @endif

                            </td>
                            <td>
                                <a href="{{route('orderDetails',$order->id)}}" class="btn btn-xs btn-success">Sipariş Durumu&Detay</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center flex-nowrap mt-4">
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css') @endsection
@section('js') @endsection
