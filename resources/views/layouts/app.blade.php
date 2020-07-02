@include('includes.head')
<body class="bg-gray-200">
    <div id="app">
        @include('includes.nav')

        <main class="container flex flex-col sm:flex-row mx-auto mt-16">
            <section id="sidebar" class="w-auto sm:w-1/6 m-2 bg-white shadow rounded divide-x sm:divide-y divide-gray-300">
                @include('includes.sidebar')
            </section>
            <section id="content" class="w-auto sm:w-5/6 m-2 bg-white shadow rounded">
                @include('includes.error')
                @yield('content')
            </section>
        </main>
    </div>
</body>
</html>
