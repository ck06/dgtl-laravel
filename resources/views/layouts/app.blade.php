<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'My App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
<header class="text-black px-6 py-4 flex flex-col justify-between items-center shadow">
    <div class="text-xl font-semibold">
        @yield('title', 'My App')
    </div>

    <nav>
        <a href="{{ route('products.index') }}" class="text-blue underline">
            All products
        </a>
    </nav>
</header>

<main class="flex-1 w-full max-w-4xl mx-auto px-4 py-10">
    <div class="bg-white rounded-lg shadow-sm p-6 flex flex-col">
        @yield('content')
    </div>
</main>
</body>
</html>
