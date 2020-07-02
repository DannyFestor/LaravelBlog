@extends('layouts.app')

@section('content')
<a class="inline-block text-center bg-blue-600 hover:bg-blue-400 text-gray-100 mx-4 my-3 p-2 rounded" href="{{ route('posts.create') }}" class="hyperlink">New Post</a>
<section class="flex flex-row flex-wrap items-stretch">
    @foreach ($posts as $post)
        <article class="w-full sm:w-1/2 lg:w-1/3 pb-6 ">
            <div class="flex flex-col justify-between m-2 p-3 shadow h-full">
                <div>
                    <a class="block w-full font-bold hyperlink" href="{{ route('posts.show', [$post->slug]) }}">{{ $post->title }}</a>
                    <p>
                        {{ substr($post->description, 0, 200) }}
                        @if (strlen($post->description) > 200)
                            ...
                        @endif
                    </p>
                </div>
                <div class="text-right">
                    <a class="block w-full hyperlink" href="{{ route('posts.show', [$post->slug]) }}">Read more</a>
                </div>
            </div>
        </article>
    @endforeach
</section>

{{ $posts->links() }}
@endsection
