@if ($errors->any())
<div class="mx-8 my-4 border-red-700 border-2 p-2 rounded bg-red-200 text-red-900">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
