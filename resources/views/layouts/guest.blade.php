<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        @yield('title', 'Login')
    </title>
    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/js/index.js',
        'resources/js/us-aea-en.js',
    ])
</head>

<body
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="darkMode = JSON.parse(localStorage.getItem('darkMode')); $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
    @include('partials.preloader')

    <div class="flex h-screen overflow-hidden">

        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            @include('partials.header-guest')

            <main class="p-4 max-w-screen-2xl md:p-6 2xl:p-10">
                @yield('content')
            </main>
            @include('partials.footer-guest')
        </div>
    </div>
</body>

</html>
