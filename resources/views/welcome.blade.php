<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">

<div class="relative bg-gray-50 overflow-hidden">
    <div class="relative pt-6 pb-16 sm:pb-24">
        <div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <nav class="relative flex items-center justify-between sm:h-10 md:justify-center" aria-label="Global">
                    <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                        <div class="flex items-center justify-between w-full md:w-auto">
                            <a href="#">
                                <span class="sr-only">Case Management</span>
                                <img class="h-8 w-auto sm:h-10"
                                     src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                            </a>
                            <div class="-mr-2 flex items-center md:hidden">
                                <button type="button"
                                        class="bg-gray-50 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                        @click="toggle" @mousedown="if (open) $event.preventDefault()"
                                        aria-expanded="false" :aria-expanded="open.toString()">
                                    <span class="sr-only">Open main menu</span>
                                    <svg class="h-6 w-6" x-description="Heroicon name: outline/menu"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:flex md:space-x-10">


                    </div>
                    <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
                          <span class="inline-flex rounded-md shadow">
                              @if (Route::has('login'))
                                  @auth
                                      <a href="{{ url('/dashboard') }}"
                                         class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50">Dashboard</a>
                                  @else
                                      <a href="{{ route('login') }}"
                                         class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50">
                                        Log in
                                    </a>
                                  @endauth
                              @endif
                          </span>
                    </div>
                </nav>
            </div>
        </div>

        <main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24">
            <div class="text-center">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block xl:inline">Cloud Forensic </span>
                    <span class="block text-indigo-600 xl:inline">System</span>
                </h1>
            </div>
        </main>
    </div>
</div>

<div class="bg-white pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div class="relative max-w-lg mx-auto divide-y-2 divide-gray-200 lg:max-w-7xl">
        <div>
            <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                Press
            </h2>
            <div class="mt-3 sm:mt-4 lg:grid lg:grid-cols-2 lg:gap-5 lg:items-center">
                <p class="text-xl text-gray-500">
                    Get weekly articles in your inbox on legal cases.
                </p>
                <form class="mt-6 flex flex-col sm:flex-row lg:mt-0 lg:justify-end">
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email-address" type="email" autocomplete="email" required=""
                               class="appearance-none w-full px-4 py-2 border border-gray-300 text-base rounded-md text-gray-900 bg-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 lg:max-w-xs"
                               placeholder="Enter your email">
                    </div>
                    <div class="mt-2 flex-shrink-0 w-full flex rounded-md shadow-sm sm:mt-0 sm:ml-3 sm:w-auto sm:inline-flex">
                        <button type="button"
                                class="w-full bg-indigo-600 px-4 py-2 border border-transparent rounded-md flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto sm:inline-flex">
                            Notify me
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-6 pt-10 grid gap-16 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-12">
            @forelse($legalCases as $legalCase)
                <div>
                    <p class="text-sm text-gray-500">
                        <time datetime="2020-03-16">{{ $legalCase->updated_at->format('F d, Y') }}</time>
                    </p>
                    <a href="/legal-case/{{ $legalCase->slug }}" class="mt-2 block">
                        <p class="text-xl font-semibold text-gray-900">
                            {{  $legalCase->title }}
                        </p>
                        <p class="mt-3 text-base text-gray-500">
                            {{ $legalCase->description }}
                        </p>
                    </a>
                    <div class="mt-3">
                        <a href="#" class="text-base font-semibold text-indigo-600 hover:text-indigo-500">
                            View full legal case
                        </a>
                    </div>
                </div>
            @empty
                <div>
                    <p class="text-gray-300 font-semibold text-sm tracking-wide">No public published legal cases</p>
                </div>
            @endforelse

        </div>
    </div>
</div>

@stack('modals')
@livewireScripts
</body>
</html>

