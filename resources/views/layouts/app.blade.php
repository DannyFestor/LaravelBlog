@include('includes.head')
<body class="bg-gray-200">
    <div id="app">
        @include('includes.nav')

        <main class="container mx-auto mt-16">
            @yield('content')
        </main>
    </div>
</body>
</html>
