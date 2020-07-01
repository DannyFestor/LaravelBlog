@extends('layouts.app')

@section('content')
    <article class="flex flex-col shadow rounded items-stretch bg-white p-5">
        <h1 class="text-2xl">{{ $tag->name }}</h1>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-600 hover:text-blue-400">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    </article>
@endsection
