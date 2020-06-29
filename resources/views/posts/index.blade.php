@extends('layouts.app')

@section('content')
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
    {{ $posts->links() }}

@endsection
