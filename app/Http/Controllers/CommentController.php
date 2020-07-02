<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('comments.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request, Post $post)
    {
        $comment = new Comment;
        $comment->title = $request->title;
        $comment->description = $request->description;
        $comment->user_id = $request->user()->id;
        $comment->post_id = $post->id;
        $comment->save();
        return redirect(route('posts.show', $post->slug));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Comment $comment)
    {
        return view('comments.edit', ['post' => $post, 'comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(StoreComment $request, Post $post, Comment $comment)
    {
        $comment->title = $request->title;
        $comment->description = $request->description;
        $comment->save();

        return redirect(route('posts.show', $post->slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect(route('posts.show', $post->slug));
    }
}
