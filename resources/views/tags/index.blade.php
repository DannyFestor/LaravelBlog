@extends('layouts.app')

@section('content')
    <section class="flex flex-col shadow rounded p-4 items-stretch bg-white">
        <a href="{{ route('tags.create') }}" class="text-blue-600 hover:text-blue-400">New Tag</a>
        @foreach ($tags as $tag)
            <div class="w-full flex flex-col sm:flex-row flex-wrap justify-between mb-2 items-center">
                <div>{{ $tag->name }}</div>
                <div>
                    <a href="{{ route('tags.show', [$tag->name]) }}" class="inline-block text-center w-24 bg-blue-600 hover:bg-blue-400 text-gray-100 mr-3 p-3 rounded">Posts</a>
                    <a href="{{ route('tags.edit', [$tag->name]) }}" class="inline-block text-center w-24 bg-green-600 hover:bg-green-400 text-gray-100 mr-3 p-3 rounded">Edit</a>
                    <form class="inline-block" action='{{ route("tags.destroy", [$tag->name]) }}' method='POST'>
                        @csrf
                        @method('DELETE')
                        <button class="w-24 bg-red-600 hover:bg-red-400 text-gray-100 p-3 rounded" type="submit">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </section>
@endsection
