@extends('layouts.app')

@section('content')
    <a href="{{ route('posts.show', [$post->slug]) }}">{{ $post->title }}</a>
    {!! $post->description !!}
    <a href="{{ route('posts.edit', [$post->slug]) }}">Edit</a>
    <a href="{{ route('posts.index') }}">Back!</a>
@endsection
