<nav class="flex items-center justify-between bg-blue-500 fixed top-0 w-full">
    <div class="flex items-center mr-6">
        <a class="p-3 text-white hover:bg-blue-100 hover:text-blue-500" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <div class="hidden sm:flex sm:flex-row sm:items-center">
            <!-- Authentication Links -->
            @guest
                <a class="p-3 text-white hover:bg-blue-100 hover:text-blue-500" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                        <a class="p-3 text-white hover:bg-blue-100 hover:text-blue-500" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <a class="p-3 text-white hover:bg-blue-100 hover:text-blue-500">
                    {{ Auth::user()->name }}
                </a>
                <a class="p-3 text-white hover:bg-blue-100 hover:text-blue-500" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>
    </div>
</nav>
