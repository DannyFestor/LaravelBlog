@extends('layouts.app')

@section('content')
    <article class="flex flex-col shadow rounded items-stretch bg-white p-5">
        <h1 class="text-2xl">{{ $tag->name }}</h1>
        <a href="{{ route('tags.index') }}">Back!</a>
        <a href="{{ route('tags.edit', [$tag->name]) }}" class="inline-block text-center w-24 bg-green-600 hover:bg-green-400 text-gray-100 mr-3 p-3 rounded">Edit</a>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-600 hover:text-blue-400">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    </article>
@endsection
