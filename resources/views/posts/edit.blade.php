@extends('layouts.app')

@section('content')
@if ($errors->any())
ERROR
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form class="bg-white shadow-md rounded px-8 py-4 mx-auto" action='{{ route("posts.update", [$post->slug]) }}' method='POST'>
    @csrf
    @method('PUT')
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
          Title
        </label>
        <input class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" id="title" type="text" placeholder="Title" value="{{ old('title', $post->title) }}">
      </div>
      <div class="mb-4">
          <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Text</label>
          <textarea name="description" id="id" cols="30" rows="10" class="shadow border rounded w-full text-gray-700 py-2 px-3 focus:outline-none focus:shadow-outline">{{ old('description', preg_replace('/<br \/>\r\n/i', '
', $post->description)) }}</textarea>
      </div>
      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Preview
        </button>
      </div>
    </form>

    <form class="bg-white shadow-md rounded px-8 py-4 mx-auto" action='{{ route("posts.destroy", [$post->slug]) }}' method='POST'>
        @csrf
        @method('DELETE')
          <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Delete
            </button>
          </div>
        </form>
@endsection