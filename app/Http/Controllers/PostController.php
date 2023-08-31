<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $user = Auth::user();

        
        $posts = $user->posts;

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $post = new Post;
        $post->filter = $request->filter;
        $post->title = $request->title;
        $post->body = $request->body;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = Storage::putFile('public/images',$request->file('image'));
            $nuevo_path = str_replace('public/', '', $path);
            $post->image_url = $nuevo_path;
        }

        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect()->route('posts.index',  $post->id);

    }
    
    /**
     * Display the specified resource.
     * 
     * @param \App\models\Post $post
     * @return \Illuminate\Htpp\Response
     */
    public function view($post)
    {
        //
        $post = Post::find($post);
        return view('view', compact('post')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post_id)
    {
          $post =  Post::find($post_id);
          if ($post->image_url){
            storage::delete('public/'.$post->image_url);
          }
          $post->delete();
          return redirect()->route('posts.index');
    }
     
     /**
     * Paginación posts.
     */

     public function cargarMasPosts(Request $request)
    {
    $page = $request->get('page', 1); 
    $perPage = 4;


    $offset = ($page - 1) * $perPage;

    $posts = Post::orderBy('created_at', 'asc')
        ->skip($offset)
        ->take($perPage)
        ->get();

   
    $html = view('posts-partial', compact('posts'))->render();

    return response()->json(['html' => $html, 'loadMore' => $posts->count() === $perPage]);
}
 

}
