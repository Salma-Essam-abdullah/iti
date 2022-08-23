@extends('layouts.app2')

@section('content')
@if(session('errormessage'))
<div class="alert alert-danger">
  {{session('errormessage')}}
</div>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    background:#eee;
}
.posts-content{
    margin-top:20px;
}
.ui-w-40 {
    width: 40px !important;
    height: auto;
}
.default-style .ui-bordered {
    border: 1px solid rgba(24,28,33,0.06);
}
.ui-bg-cover {
    background-color: transparent;
    background-position: center center;
    background-size: cover;
}
.ui-rect {
    padding-top: 50% !important;
}
.ui-rect, .ui-rect-30, .ui-rect-60, .ui-rect-67, .ui-rect-75 {
    position: relative !important;
    display: block !important;
    padding-top: 100% !important;
    width: 100% !important;
}
.d-flex, .d-inline-flex, .media, .media>:not(.media-body), .jumbotron, .card {
    -ms-flex-negative: 1;
    flex-shrink: 1;
}
.bg-dark {
    background-color: rgba(24,28,33,0.9) !important;
}
.card-footer, .card hr {
    border-color: rgba(24,28,33,0.06);
}
.ui-rect-content {
    position: absolute !important;
    top: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    left: 0 !important;
}
.default-style .ui-bordered {
    border: 1px solid rgba(24,28,33,0.06);
}
    </style>
</head>
<body>
@foreach($saves as $save)
@foreach($images as $image)
@if($image->save_id == $save['id'])
<div class="container posts-content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
              <div class="card-body">
                <div class="media mb-3">
                  <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="d-block ui-w-40 rounded-circle" alt="">
                  <div class="media-body ml-3">
                    <h6 class="mb-0">{{$save['username']}}</h6>
                  </div>
                </div>
                <p>
                {{$save['caption']}}
                </p>
                <div class="row">
                    <div class="col-md-3">
                    <a href="{{ route('posts.show',$save['post_id']) }}" >  <img src="{{'storage/images/'.$image->url}}" class="img-fluid" alt=""></a>
                    </div>

              </div>

            </div>
        </div>

            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endforeach

</body>
</html>
@endsection
