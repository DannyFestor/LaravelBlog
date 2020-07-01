@extends('layouts.app')

@section('content')
    <form class="bg-white shadow-md rounded px-8 py-4 mx-auto" action='{{ route("tags.store") }}' method='POST'>
    @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
          Name
        </label>
        <input class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" type="text" placeholder="Name" value="{{ old('name') }}">
      </div>
            <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Preview
        </button>
      </div>
    </form>
@endsection
