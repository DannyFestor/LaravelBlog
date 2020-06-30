<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBlogPost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->where('published', True)->latest()->paginate(15);
        return view('posts.index', ['posts' => $posts]);
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
    // public function store(Request $request)
    public function store(StoreBlogPost $request)
    {
        // $data = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'description' => 'required'
        // ]);

        /* Advanced Validator */
        // $rules = [
        //   'title'       => 'required|unique:posts|max:255',
        //   'description' => 'required'
        // ];
        // $messages = [
        //   'required' => ':attribute ist benötigt',
        //   'unique'   => ':attribute muss einzigartig sein'
        // ];

        // $validator = Validator::make($request->all(), $rules, $messages);
        // if( $validator->fails() )
        // {
            //     // dd($validator);
            //     return redirect(route('posts.create'))->withErrors($validator)->withInput();
            // }

        /* Use FormRequest */
        $validated = $request->validated();

        $post = new Post;
        $post->title = $request->title;
        // $post->description = nl2br($request->description);
        $post->description = $request->description;
        $post->user_id = Auth::id();
        $post->slug = Str::slug(date('Ymd') . '-' . substr($request->title, 0, 22), '-');
        $post->save();

        return redirect()->route('posts.show', [$post->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, Post $post)
    {
        $validated = $request->validated();

        $post->title = $request->title;
        $post->description = nl2br($request->description);
        $post->slug = Str::slug(date('Ymd') . '-' . substr($request->title, 0, 22), '-');
        $post->save();
        return redirect()->route('posts.show', [$post->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreBlogPost $request, Post $post)
    {
        $validated = $request->validated();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
