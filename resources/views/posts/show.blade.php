@extends('layouts.app')

@section('content')
    <article class="flex flex-col items-stretch p-5">
        <section id="title" class="w-full">
            <h1 class="text-3xl">
                {{ $post->title }}
            </h1>
        </section>
        <section id="metainfo" class="text-right">
            <p>
                {{ $post->user->name }} at
                {{ date('Y/m/d H:i', strtotime($post->created_at)) }}
            </p>
        </section>
        <section id="tags">
            @foreach ($tags as $tag)
                <a href="{{ route('tags.show', [$tag->name]) }}">#{{ $tag->name }}</a>
            @endforeach
        </section>
        <section id="description">
            {!! nl2br(e($post->description)) !!}
        </section>
        <section id="buttons" class="mt-5 flex items-stretch justify-end">
            @can('update-post', $post)
                <a class="w-24 text-center bg-blue-600 hover:bg-blue-400 text-gray-100 mr-3 p-3 rounded" href="{{ route('posts.edit', [$post->slug]) }}">Edit</a>
                <form action='{{ route("posts.destroy", [$post->slug]) }}' method='POST'>
                    @csrf
                    @method('DELETE')
                    <button class="w-24 bg-red-600 hover:bg-red-400 text-gray-100 mr-3 p-3 rounded" type="submit">
                        Delete
                    </button>
                </form>
            @endcan
            <a class="w-24 text-center p-3 text-blue-600 hover:text-blue-400" href="{{ route('posts.index') }}">Back!</a>
        </section>
        <section id="comments" class="mt-5">
            <a class="text-center bg-blue-600 hover:bg-blue-400 text-gray-100 mr-3 p-1 rounded" href="{{ route('comments.create', [$post->slug]) }}" class="hyperlink">New Comment</a>
            @foreach($comments as $comment)
                <div class="flex flex-col items-stretch border-t mt-4 p-2">
                    <div class="flex justify-between">
                        <h3 class="font-bold">{{ $comment->title }}</h3>
                        <p>By {{ $comment->user()->first()->name }}</p>
                    </div>
                    <div class="flex flex-col items-end">
                        <div>
                            @can('update-comment', $comment)
                                <a class="inline-block w-24 text-center bg-green-600 hover:bg-green-400 text-gray-100 mx-1 p-1 rounded" href="{{ route('comments.edit', [$post->slug, $comment->id]) }}" class="hyperlink">Edit</a>
                                <form class="inline-block" action='{{ route("comments.destroy", [$post->slug, $comment->id]) }}' method='POST'>
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-24 bg-red-600 hover:bg-red-400 text-gray-100 p-1 rounded" type="submit">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                    <p>
                        {{ $comment->description }}
                    </p>
                    <div class="text-right">

                    </div>
                </div>
            @endforeach
        </section>
    </article>
@endsection
