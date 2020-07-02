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
    </article>
@endsection
