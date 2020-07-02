@extends('layouts.app')

@section('content')
<form class="px-8 py-4 mx-auto" action='{{ route("comments.update", [$post->slug, $comment->id]) }}' method='POST'>
    @csrf
    @method('PUT')
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
          Title
        </label>
        <input class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" id="title" type="text" placeholder="Title" value="{{ old('title', $comment->title) }}">
      </div>
      <div class="mb-4">
          <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Text</label>
          <textarea name="description" id="id" cols="30" rows="10" class="shadow border rounded w-full text-gray-700 py-2 px-3 focus:outline-none focus:shadow-outline">{{ old('description', $comment->description) }}</textarea>
      </div>
      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Preview
        </button>
      </div>
    </form>
@endsection
