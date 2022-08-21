@section('title', "Search Result")
@include('layouts.app2')
@foreach($posts as $post)

<div class="card" style="width: 35rem; margin:50px;">
  <a  href="{{ route('posts.show',$post['id']) }}" >  <img  src="{{Storage::disk('public')->url('/images//'.$post->images[0]->url)}}" alt="{{$post->caption}}" width="100%" height="100%"></a>
              
  <div class="card-body">
    <!-- username -->
    <h5 class="card-title">{{ $post->user->username }}</h5>
    <p class="card-text">{{ $post->caption }}</p>
    <p>{{ $post->created_at->diffForHumans() }}</p>
  </div>
</div>
@endforeach

