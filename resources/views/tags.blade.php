@include('includes.navbar')
<div class="container tagsPage">
        <div class="row">
            <div class="col-md-12 mb-4">

                <h4 class="display-4">{{ $tag->name }} </h4>


            </div>
            @foreach($posts as $post)

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a class="profilePost" href="{{url('post/'.$post->id )}}"><img class="img-fluid" src="{{asset('uploads/post/'.$post->image)}}" alt=""></a>
                </div>
            @endforeach
        </div>
    </div>