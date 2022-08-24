@include('includes.navbar')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('posts.update',$posts['id']) }}" >
    @method('PUT')
    @csrf
    <div class="mb-3">


              <label  class="form-label">New Caption</label>
              <input type="text" class="form-control" name="caption" value="{{ $posts['caption'] }}" >
            </div>


     
 
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>