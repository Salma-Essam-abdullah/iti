@extends('layouts.app2')

@section('content')



    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show post</h2>

            </div>



        </div>



        <div class="pull-right">




 <div class="col-xs-12 col-sm-12 col-md-12">



  <img src="/storage/{{ $post->image }}" style="width: 700px;">

  </div>
<div class="col-xs-12 col-sm-12 col-md-12">

   <div class="form-group"> {{ $post['caption'] }} </div></div>




            <a class="btn btn-primary" href="{{ route('profile.index') }}"> Back home</a>




        </div>



    </div>

@endsection

</html>
