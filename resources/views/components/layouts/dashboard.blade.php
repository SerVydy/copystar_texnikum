<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite('resources/css/app.css')
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
</head>

<body class="grid grid-cols-[1fr_4fr] h-screen">
    <aside class="bg-black ">
        <h2 class="text-gray-200">Боковое меню</h2>
        <ul>
            <li>
               <x-dashboard.a route="dashboard.category" wire:navigate>Category</x-dashboard.a>
            </li>
            <li>
               <x-dashboard.a route="dashboard.country" wire:navigate>Country</x-dashboard.a>
            </li>
            <li>
               <x-dashboard.a route="dashboard.user" wire:navigate>Users</x-dashboard.a>
            </li>
            <li>
                <x-dashboard.a route="dashboard.products" wire:navigate>Products</x-dashboard.a>
            </li>
        </ul>
    </aside>
    <div class="container flex flex-col">
        <header class="bg-amber-200">
            <a href="{{ route('home') }}" wire:navigate>Home</a>
        </header>
        <main class="flex-grow">
            {{ $slot }}
        </main>
        <footer class="bg-blue-200">
            footer
        </footer>
    </div>

</body>

</html>
