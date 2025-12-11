<!doctype html>
<html lang="nl" class="h-full bg-witte_eend">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
<div class="min-h-full">

    <!-- NAVBAR -->
    <nav class="bg-white" aria-labelledby="main-nav">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">

                <!-- Logo + Desktop Nav -->
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                             alt="Your Company"
                             class="size-8"/>
                    </div>

                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <x-nav-bar-link href="{{ route('welcome') }}" :active="request()->is('/')">Welcome</x-nav-bar-link>
                            <x-nav-bar-link href="{{ route('login') }}" :active="request()->is('/')">Welcome</x-nav-bar-link>
{{--                            <x-nav-bar-link href="{{route('')}}" :active="request()->is('')}}"></x-nav-bar-link>--}}
{{--                            <x-nav-bar-link href="{{route('')}}" :active="request()->is('')}}"></x-nav-bar-link>--}}
{{--                            <x-nav-bar-link href="{{route('')}}" :active="request()->is('')}}"></x-nav-bar-link>--}}
                            {{-- @auth
                                @if (/* admin check */)
                                    <x-nav-bar-link href="{{ route('admin.index') }}" :active="request()->is('admin.index') }}">
                                        Admin
                                    </x-nav-bar-link>
                                @endif
                            @endauth --}}
                        </div>
                    </div>
                </div>

                <!-- Mobile Hamburger -->
                <div class="md:hidden">
                    <button type="button"
                            command="--toggle"
                            commandfor="mobile-menu"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>

{{--                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                             stroke-width="1.5" aria-hidden="true"--}}
{{--                             class="size-6 in-aria-expanded:hidden">--}}
{{--                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"--}}
{{--                                  stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        </svg>--}}

{{--                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                             stroke-width="1.5" aria-hidden="true"--}}
{{--                             class="size-6 not-in-aria-expanded:hidden">--}}
{{--                            <path d="M6 18 18 6M6 6l12 12"--}}
{{--                                  stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        </svg>--}}
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Menu -->
        <el-disclosure id="mobile-menu" hidden class="block md:hidden">
            <div class="px-4 pt-4 pb-3 space-y-2">
                <x-nav-bar-link href="{{ route('welcome') }}" :active="request()->is('/')">Welcome</x-nav-bar-link>
{{--                <x-nav-bar-link href="{{route('')}}" :active="request()->is('')}}"></x-nav-bar-link>--}}
{{--                <x-nav-bar-link href="{{route('')}}" :active="request()->is('')}}"></x-nav-bar-link>--}}
{{--                <x-nav-bar-link href="{{route('')}}" :active="request()->is('')}}"></x-nav-bar-link>--}}
            </div>

            <!-- Mobile User Info -->
            <div class="border-t border-gray-200 pt-4 pb-3">
                <div class="flex items-center px-5">
                    <img class="size-10 rounded-full"
                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e"
                         alt="User avatar"/>

                    <button type="button"
                            class="ml-auto p-1 text-gray-400 hover:text-gray-600 focus:outline-none">
                        <span class="sr-only">View notifications</span>

{{--                        <svg class="size-6" fill="none" stroke="currentColor"--}}
{{--                             stroke-width="1.5" viewBox="0 0 24 24">--}}
{{--                            <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31..."--}}
{{--                                  stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        </svg>--}}
                    </button>
                </div>
            </div>
        </el-disclosure>
    </nav>

    <!-- HEADER -->
    <header class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-0 after:border-y after:border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-white">{{ $heading }}</h1>
        </div>
    </header>

    <!-- CONTENT -->
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

</div>
</body>
</html>
