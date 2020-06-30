@extends('layouts.app')

@section('content')
    <article class="flex flex-col items-stretch">
        <section class="w-full">
            <h1 class="text-3xl">
                {{ $post->title }}
            </h1>
        </section>
        <section>
            {!! nl2br(e($post->description)) !!}
        </section>
    </article>

    <a href="{{ route('posts.edit', [$post->slug]) }}">Edit</a>
    <a href="{{ route('posts.index') }}">Back!</a>
@endsection
