@extends('backend.layout')
@section('title',"Site Ayarları")
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
                <h4 class="card-title">Site Ayarları Sayfası</h4>
                <p class="card-description">
                    Bu sayfada yapılacak değişikler ana sayfada direkt değişiklik olacaktır <br>
                    o yüzden dikkatli olunuz lütfen.
                </p>
                <form method="post" action="{{route('settingsUpdate')}}" enctype="multipart/form-data" class="forms-sample">
                    @CSRF
                    <div class="form-group">
                        <label for="exampleInputEmail3">Resim 1(Kapak)</label>
                            <input type="file" name="logo" class="file-upload-default">
                            <div class="input-group col-xs-12"><img class="image-zoom" width="70" src="{{asset('frontend')}}/img/{{$settings->logo}}">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">

                                <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                            </div>

                    </div>
                    <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('css') @endsection
@section('js')
    <script src="{{asset('backend')}}/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="{{asset('backend')}}/vendors/select2/select2.min.js"></script>
    <script src="{{asset('backend')}}/js/file-upload.js"></script>
    <script src="{{asset('backend')}}/js/typeahead.js"></script>
    <script src="{{asset('backend')}}/js/select2.js"></script>
@endsection
