<nav class="flex-1 px-2 space-y-1">

    @can('view dashboard')
        <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300"
                 xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            {{ __('Dashboard') }}
        </x-jet-nav-link>
    @endcan

    @can('list users')
        <x-jet-nav-link href="{{ route('users.index') }}"
                        :active="\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'users')">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            {{ __('Users') }}
        </x-jet-nav-link>
    @endcan

        @can('list legal cases')
        <x-jet-nav-link href="{{ route('legal-cases.index') }}"
                        :active="\Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'legal-cases')">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
            </svg>
            {{ __('Legal Cases') }}
        </x-jet-nav-link>
    @endcan

    @can('list institutions')
        <x-jet-nav-link href="{{ route('institutions') }}" :active="request()->routeIs('institutions')" permissions="">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
            {{ __('Institutions') }}
        </x-jet-nav-link>
    @endcan

    @can('manage roles')
        <x-jet-nav-link href="{{ route('roles') }}" :active="request()->routeIs('roles')">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
            {{ __('Roles') }}
        </x-jet-nav-link>
    @endcan
</nav>
