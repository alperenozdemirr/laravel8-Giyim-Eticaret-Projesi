@extends('backend.layout')
@section('title',"Edit")
@section('content')
    <head>
        <style>
            .image-zoom{
                transition: 0.8s;
                cursor: zoom-in;
            }
            .image-zoom:active{
                transform: scale(3.5);
                z-index: 999;

            }
        </style>
    </head>
    <div class="d-flex justify-content-center flex-nowrap mt-4">
    <div class="col-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ürün Detay & Güncelleme Sayfası</h4>
                <p class="card-description">
                    Bu sayfada yapılacak değişikler ana sayfada direkt değişiklik olacaktır<br>
                    o yüzden dikkatli olunuz lütfen.
                </p>
                <form method="post" action="{{route('admin.productUpdate')}}" enctype="multipart/form-data" class="forms-sample">
                    @CSRF
                    <input type="hidden" value="{{$product->id}}" name="id">
                    <div class="form-group">
                        <label for="exampleInputName1">Ürün İsmi</label>
                        <input type="text" class="form-control" value="{{$product->product_name}}" name="name" value="{{old('name')}}" id="exampleInputName1" placeholder="ismi">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori Seç</label>
                        <select class="form-control" name="categori"  id="select-kategori">
                            <option>Kategori Seç</option>
                            @foreach($categories as $categori)
                                <option value="{{$categori->id}}">{{$categori->categori_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Resim 1(Kapak)</label>
                            <input type="file" name="img1" class="file-upload-default">
                            <div class="input-group col-xs-12"><img class="image-zoom" width="70" src="{{asset('frontend')}}/img/product/{{$product->img1}}">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">

                                <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                            </div>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Resim 2</label>
                        <input type="file" name="img2" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <img class="image-zoom" width="70" src="{{asset('frontend')}}/img/product/{{$product->img2}}">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Resim 3</label>
                        <input type="file" name="img3" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <img class="image-zoom" width="70" src="{{asset('frontend')}}/img/product/{{$product->img3}}">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Resim 4</label>
                        <input type="file" name="img4" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <img class="image-zoom" width="70" src="{{asset('frontend')}}/img/product/{{$product->img4}}">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Fiyat</label>
                        <input type="number" class="form-control" name="price" value="{{$product->product_price}}" id="exampleInputPassword4" placeholder="Fiyat">
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Ürün Açıklaması</label>
                        <textarea class="form-control" name="info"  id="exampleTextarea1" rows="7">{{$product->product_info}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.getElementById("select-kategori").value="{{$product->categori}}";
    </script>
@endsection
@section('css') @endsection
@section('js')
    <script src="{{asset('backend')}}/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="{{asset('backend')}}/vendors/select2/select2.min.js"></script>
    <script src="{{asset('backend')}}/js/file-upload.js"></script>
    <script src="{{asset('backend')}}/js/typeahead.js"></script>
    <script src="{{asset('backend')}}/js/select2.js"></script>
@endsection
