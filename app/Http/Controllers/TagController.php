<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = DB::table('tags')->orderBy('name', 'asc')->get();
        return view('tags.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTag $request)
    {
        $validated = $request->validated();

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        return redirect(route('tags.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('tags.show',
            [
                "tag" => $tag,
                "posts" => $tag->posts()->get()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', ["tag" => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTag $request, Tag $tag)
    {
        $validated = $request->validated();
        $tag->name = $request->name;
        $tag->save();

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreTag $request, Tag $tag)
    {
        $validated = $request->validated();
        $tag->delete();
        return redirect(route('tags.index'));
    }
}
