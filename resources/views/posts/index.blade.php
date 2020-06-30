@extends('layouts.app')

@section('content')
    <section class="flex flex-row flex-wrap items-stretch">
        @foreach ($posts as $post)
            <article class="w-full sm:w-1/2 lg:w-1/3 pb-6 ">
                <div class="flex flex-col justify-between m-2 p-3 bg-white shadow h-full">
                    <div>
                        <strong><a class="block w-full text-blue-500 hover:text-blue-700 hover:bg-blue-100" href="{{ route('posts.show', [$post->slug]) }}">{{ $post->title }}</a></strong>
                        <p>
                            {{ substr($post->description, 0, 200) }}
                            @if (strlen($post->description) > 200)
                                ...
                            @endif
                        </p>
                    </div>
                    <div class="text-right">
                        <a class="block w-full text-blue-500 hover:text-blue-700 hover:bg-blue-100" href="{{ route('posts.show', [$post->slug]) }}">Read more</a>
                    </div>
                </div>
            </article>
        @endforeach
    </section>

    {{ $posts->links() }}
@endsection
