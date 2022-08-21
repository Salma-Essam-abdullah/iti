@section('title', "Search Result")
@include('layouts.app2')
@foreach($posts as $post)

<div class="card" style="width: 35rem; margin:50px;">
  <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="{{ $post->caption }}" >
  <div class="card-body">
    <!-- username -->
    <h5 class="card-title">{{ $post->user->username }}</h5>
    <p class="card-text">{{ $post->caption }}</p>
    <p>{{ $post->created_at->diffForHumans() }}</p>
  </div>
</div>
@endforeach

