@include('layouts.app2');
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /*

All grid code is placed in a 'supports' rule (feature query) at the bottom of the CSS (Line 310).

The 'supports' rule will only run if your browser supports CSS grid.

Flexbox and floats are used as a fallback so that browsers which don't support grid will still recieve a similar layout.

*/

/* Base Styles */

:root {
    font-size: 10px;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}

body {
    font-family: "Open Sans", Arial, sans-serif;
    min-height: 100vh;
    background-color: #fafafa;
    color: #262626;
    padding-bottom: 3rem;
}

img {
    display: block;
}

.container {
    max-width: 93.5rem;
    margin: 0 auto;
    padding: 0 2rem;
}


.btn:focus {
    outline: 0.5rem auto #4d90fe;
}

.visually-hidden {
    position: absolute !important;
    height: 1px;
    width: 1px;
    overflow: hidden;
    clip: rect(1px, 1px, 1px, 1px);
}

/* Profile Section */

.profile {
    padding: 5rem 0;
}

.profile::after {
    content: "";
    display: block;
    clear: both;
}

.profile-image {
    float: left;
    width: calc(33.333% - 1rem);
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 3rem;
}

.profile-image img {
    border-radius: 50%;
}

.profile-user-settings,
.profile-stats,
.profile-bio {
    float: left;
    width: calc(66.666% - 2rem);
}

.profile-user-settings {
    margin-top: 1.1rem;
}

.profile-user-name {
    display: inline-block;
    font-size: 3.2rem;
    font-weight: 300;
}

.profile-edit-btn {
    font-size: 1.4rem;
    line-height: 1.8;
    border: 0.1rem solid #dbdbdb;
    border-radius: 0.3rem;
    padding: 0 2.4rem;
    margin-left: 2rem;
}

.profile-settings-btn {
    font-size: 2rem;
    margin-left: 1rem;
}

.profile-stats {
    margin-top: 2.3rem;
}

.profile-stats li {
    display: inline-block;
    font-size: 1.6rem;
    line-height: 1.5;
    margin-right: 4rem;
    cursor: pointer;
}

.profile-stats li:last-of-type {
    margin-right: 0;
}

.profile-bio {
    font-size: 1.6rem;
    font-weight: 400;
    line-height: 1.5;
    margin-top: 2.3rem;
}

.profile-real-name,
.profile-stat-count,
.profile-edit-btn {
    font-weight: 600;
}

/* Gallery Section */

.gallery {
    display: flex;
    flex-wrap: wrap;
    margin: -1rem -1rem;
    padding-bottom: 3rem;
}

.gallery-item {
    position: relative;
    flex: 1 0 22rem;
    margin: 1rem;
    color: #fff;
    cursor: pointer;
}

.gallery-item:hover .gallery-item-info,
.gallery-item:focus .gallery-item-info {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
}

.gallery-item-info {
    display: none;
}

.gallery-item-info li {
    display: inline-block;
    font-size: 1.7rem;
    font-weight: 600;
}

.gallery-item-likes {
    margin-right: 2.2rem;
}

.gallery-item-type {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 2.5rem;
    text-shadow: 0.2rem 0.2rem 0.2rem rgba(0, 0, 0, 0.1);
}

.fa-clone,
.fa-comment {
    transform: rotateY(180deg);
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Loader */

.loader {
    width: 5rem;
    height: 5rem;
    border: 0.6rem solid #999;
    border-bottom-color: transparent;
    border-radius: 50%;
    margin: 0 auto;
    animation: loader 500ms linear infinite;
}

/* Media Query */

@media screen and (max-width: 40rem) {
    .profile {
        display: flex;
        flex-wrap: wrap;
        padding: 4rem 0;
    }

    .profile::after {
        display: none;
    }

    .profile-image,
    .profile-user-settings,
    .profile-bio,
    .profile-stats {
        float: none;
        width: auto;
    }

    .profile-image img {
        width: 7.7rem;
    }

    .profile-user-settings {
        flex-basis: calc(100% - 10.7rem);
        display: flex;
        flex-wrap: wrap;
        margin-top: 1rem;
    }

    .profile-user-name {
        font-size: 2.2rem;
    }

    .profile-edit-btn {
        order: 1;
        padding: 0;
        text-align: center;
        margin-top: 1rem;
    }

    .profile-edit-btn {
        margin-left: 0;
    }

    .profile-bio {
        font-size: 1.4rem;
        margin-top: 1.5rem;
    }

    .profile-edit-btn,
    .profile-bio,
    .profile-stats {
        flex-basis: 100%;
    }

    .profile-stats {
        order: 1;
        margin-top: 1.5rem;
    }

    .profile-stats ul {
        display: flex;
        text-align: center;
        padding: 1.2rem 0;
        border-top: 0.1rem solid #dadada;
        border-bottom: 0.1rem solid #dadada;
    }

    .profile-stats li {
        font-size: 1.4rem;
        flex: 1;
        margin: 0;
    }

    .profile-stat-count {
        display: block;
    }

}

/* Spinner Animation */

@keyframes loader {
    to {
        transform: rotate(360deg);
    }
}

/*

The following code will only run if your browser supports CSS grid.

Remove or comment-out the code block below to see how the browser will fall-back to flexbox & floated styling.

*/

@supports (display: grid) {
    .profile {
        display: grid;
        grid-template-columns: 1fr 2fr;
        grid-template-rows: repeat(3, auto);
        grid-column-gap: 3rem;
        align-items: center;
    }

    .profile-image {
        grid-row: 1 / -1;
    }

    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(22rem, 1fr));
        grid-gap: 2rem;
    }

    .profile-image,
    .profile-user-settings,
    .profile-stats,
    .profile-bio,
    .gallery-item,
    .gallery {
        width: auto;
        margin: 0;
    }

    @media (max-width: 40rem) {
        .profile {
            grid-template-columns: auto 1fr;
            grid-row-gap: 1.5rem;
        }

        .profile-image {
            grid-row: 1 / 2;
        }

        .profile-user-settings {
            display: grid;
            grid-template-columns: auto 1fr;
            grid-gap: 1rem;
        }

        .profile-edit-btn,
        .profile-stats,
        .profile-bio {
            grid-column: 1 / -1;
        }

        .profile-user-settings,
        .profile-edit-btn,
        .profile-settings-btn,
        .profile-bio,
        .profile-stats {
            margin: 0;
        }
    }
}

        </style>
</head>
<body>


<header>

	<div class="container">


		<div class="profile">

			<div class="profile-image">

                <img src="{{Storage::disk('public')->url('/images//'.$profile['image'])}}" width="250" height="200" >
			</div>
			<div class="profile-user-settings">

				<h1 class="profile-user-name">{{$profile['user']['username']}}</h1>
                @auth
                    @unless(auth()->user()->is($profile['user']))
                        @if(auth()->user()->isFollowing($profile['user']))
                            <form action="{{route('follow',$profile['user']->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Unfollow</button>
                        @elseif ( (auth()->user()->isFollowing($profile['user']) && !$profile['user']->isFollowing(auth()->user())) || (!auth()->user()->isFollowing($profile['user']) && $profile['user']->isFollowing(auth()->user())) )
                            <form action="{{route('follow',$profile['user']->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Follow Back</button>
                            </form>
                        @else
                            <form action="{{route('follow',$profile['user']->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Follow</button>
                        @endif
                    @endunless
                @endauth
                @auth
                    @if(auth()->user()->is($profile['user']))
                    <a href="{{route('profile.edit' ,$profile['id'])}}" class="btn profile-edit-btn">Edit Profile</a>
                <a href="{{route('users.edit' ,$profile['user']['id'])}}" class="btn profile-edit-btn">Edit Account</a>
                    @endif
                @endauth

                @auth
                    @if(auth()->user()->is($profile['user']))
                        <a href="{{route('posts.create')}}" class="btn profile-edit-btn">Add Post</a>
                    @endif
                @endauth
                <br>







			</div>

			<div class="profile-stats">

				<ul>
                <li><span class="profile-stat-count">{{$profile['user']['posts']->count()}}</span> posts</li>
                @if( $profile['user']->id == Auth::id() )
					<li><span class="profile-stat-count">{{$profile['user']->followers()->count()}}</span><a href="{{Route('profile.followers',$profile['id'])}}"> followers</a></li>
					<li><span class="profile-stat-count">{{$profile['user']->follows->count()}}</span><a href="{{Route('profile.following',$profile['id'])}}">  following</a></li>
                    @else
                    <li><span class="profile-stat-count">{{$profile['user']->followers()->count()}}</span> followers</li>
					<li><span class="profile-stat-count">{{$profile['user']->follows->count()}}</span>  following</li>

                    @endif
				</ul>

			</div>
            <div class="profile-stats">



<ul>

<li>


</li>

</ul>



</div>

			<div class="profile-bio">


                <p><span class="profile-real-name">Gender : </span>{{$profile['gender']}}</p>
				<p><span class="profile-real-name">Bio : </span>{{$profile['bio']}}</p>
                <p><span class="profile-real-name">Webiste : </span>{{$profile['website']}}</p>

			</div>


		</div>
		<!-- End of profile section -->

        <div class="row pt-5">
              @foreach($profile['user']['posts'] as $post)
                  <div class="col-4 pb-4">
                      <a href="{{route('posts.show' ,$post['id'])}}">
                          <img  src="{{Storage::disk('public')->url('/images//'.$post->images[0]->url)}}" alt="{{$post->caption}}" width="100%" height="100%"></a>
                      </a>
                      @if( $profile['user']->id == Auth::id() )

                        <form action="{{ route('posts.destroy',$post['id']) }}" method="Post">

                         @csrf
                          @method('DELETE')
                      <a class="btn btn-primary" href="{{ route('posts.edit',$post['id']) }}">Edit</a>
                        <button type="submit" class="btn btn-danger ">Delete</button>
                          </form>

                      @endif
                  </div>
                  @endforeach
          </div>
	</div>
	<!-- End of container -->
</header>


</body>
</html>
