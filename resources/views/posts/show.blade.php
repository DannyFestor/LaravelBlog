@extends('layouts.app')

@section('content')
    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
    {!! $post->description !!}
    <a href="{{ url()->previous() }}">Back!</a>
@endsection
