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

  <div style="width: 400px; float:left; height:500px; margin:10px">
    @foreach($saves as $save)

  <div style = "display:inline" class="media mb-3">
    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="d-block ui-w-40 rounded-circle" alt="">
    <div class="media-body ml-3">
      <h6 class="mb-0">Caption : {{$save['caption']}}</h6>
      <h6 class="mb-0">User Name :{{$save['username']}}</h6>
      <hr>
      <br>
      <br>
      <br>
      <br>
      
    </div>
  </div>
@endforeach
    </div>

    <div style="width: 100px; float:left; height:100px; margin:10px">
      @foreach($saves as $save)
      @foreach($savedimages as $image)
      @if($image->save_id== $save['id'])  
           <a href="{{ route('posts.show',$image['id']) }}" >  <img src="{{'storage/images/'.$image->url}}" class="img-fluid" alt=""></a>

           <br>
           <br>
           
           
      @endif
      @endforeach
      @endforeach
    </div>





</body>
</html>
@endsection