<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;

use App\Models\Profile;
use App\Models\save;
use App\Models\Like;
use App\Models\User;
use App\Models\Image;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $profile = Profile::all();
        $posts = Post::paginate(8);
        $image = Image::all();
        $posts = Post::all();

        return view('posts.index')->with(['posts' => $posts])->with('profiles', $profile)->with('images', $image);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $post =  $request->all();
        $post = new Post;
    $post->caption = $request->caption;
      $post->user_id = Auth::user()->id;
    $post->save(); 
      foreach ($request->file('images') as $imagefile) {  
             $image = new Image;

      $path = $imagefile->store('public/images');
      $image->url = basename($path);
      $image->post_id = $post->id;
      $image->save();
      }
  
      ;
    

  
      return redirect('posts')->with('success', 'post has been added');

    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with(['posts' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //
    }
    // search with username or name

    public function search()
    {
        $search = request('search');
        $users = User::where('username', 'like', '%' . $search . '%')->orWhere('name', 'like', "%{$search}%")->get();
        $posts = Post::whereHas('user', function ($query) use ($users) {
            $query->whereIn('id', $users->pluck('id'));
        })->get();
        return view('posts.search')->with(['posts' => $posts]);
    }
    public function save($id)
    {
      $user =auth()-> user();
      $post = Post:: find($id);
      $save = new save;
      $image = image::all();
      $save->username =$user->name;
      $save->caption =$post->caption;
      $save->image =$image->image;
      $save -> save();
        return redirect()->route('posts.index');
    }
    public function showsaved()
    {
        $saves = save::all();
        $image = image::all();
        $user =auth()-> user();
      return view('posts.showsaved')->with(['saves' => $saves])->with(['images' => $image]);
    } 

    public function like(Request $request){
        $like_s = $request->like_s;
        $post_id = $request->post_id;
        $change_like = 0;
        $like = DB::table('likes')->where('post_id', $post_id)->where('user_id', Auth::user()->id)->first();
        if(!$like){
            $new_like = new Like;
            $new_like->post_id = $post_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like = 1;
            $new_like->save();
            $is_like = 1;
         }
            elseif($like->like == 1){
              DB::table('likes')->where('post_id', $post_id)->where('user_id', Auth::user()->id)->delete();
                $is_like = 0;
            }
            elseif($like->like == 0){
                DB::table('likes')->where('post_id', $post_id)->where('user_id', Auth::user()->id)->update(['like' => 1]);
                $is_like = 1;
                $change_like =1;
            }
            $response = array(
                'is_like' => $is_like,
                'change_like' => $change_like,
              
            );
            

            return response()->json($response , 200);
        }
    

    
    




    public function dislike(Request $request){
        $like_s = $request->like_s;
        $post_id = $request->post_id;
        
        $change_dislike = 0;
        $dislike = DB::table('likes')->where('post_id', $post_id)->where('user_id', Auth::user()->id)->first();
        if(!$dislike){
            $new_like = new Like();
            $new_like->post_id = $post_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like = 0;
            $new_like->save();
            $is_dislike = 1;
         }
            elseif($dislike->like == 0){
              DB::table('likes')->where('post_id', $post_id)->where('user_id', Auth::user()->id)->delete();
                $is_dislike = 0;
            }
            elseif($dislike->like == 1){
                DB::table('likes')->where('post_id', $post_id)->where('user_id', Auth::user()->id)->update(['like' => 0]);
                $is_dislike = 1;
                $change_dislike =1;
            }
            $response = array(
                'is_dislike' => $is_dislike,
                'change_dislike' => $change_dislike,
              
            );


            

            return response()->json($response , 200);



        }
    
public function saveComment(Request $request, $id)
    {
        // $post = Post::find($id);
        // $post->comments()->create($request->all());
        // return redirect('/posts')->with('success', 'Comment added successfully');

        $request -> validate([
            'comment' => 'required'
        ]);
        $data = new Comment;
        $data->user_id=$request->user()->id;
        $data->post_id=$id;
        $data->comment=$request->comment;

       
    
        $data->save();
        return redirect()->back()->with('success', 'Comment added successfully');
    }
    




}
