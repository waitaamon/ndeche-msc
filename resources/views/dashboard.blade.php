<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900"> {{ _('Dashboard') }}</h1>
    </x-slot>

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">

            <x-jet-welcome/>

        </div>
    </div>

    <div class="py-1">
        <div class="bg-white overflow-hidden sm:rounded-lg">

            <div class="bg-gray-100">
                <div class="max-w-8xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            General stats
                        </h3>

                        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                            <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                                <dt>
                                    <div class="absolute bg-indigo-500 rounded-md p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Institutions</p>
                                </dt>
                                <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                                    <p class="text-2xl font-semibold text-gray-900">
                                        {{ $institutionsCount }}
                                    </p>
                                    <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                                        <div class="text-sm">
                                            <a href="{{ route('institutions.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> View all</a>
                                        </div>
                                    </div>
                                </dd>
                            </div>

                            <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                                <dt>
                                    <div class="absolute bg-indigo-500 rounded-md p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-sm font-medium text-gray-500 truncate">Cases Under Investigations</p>
                                </dt>
                                <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                                    <p class="text-2xl font-semibold text-gray-900">
                                        {{ $casesCount }}
                                    </p>

                                    <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                                        <div class="text-sm">
                                            <a href="{{ route('legal-cases.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> View all</a>
                                        </div>
                                    </div>
                                </dd>
                            </div>

                            <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                                <dt>
                                    <div class="absolute bg-indigo-500 rounded-md p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total logs</p>
                                </dt>
                                <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                                    <p class="text-2xl font-semibold text-gray-900">
                                        {{ number_format($sysEventsCount) }}
                                    </p>
                                    <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                                        <div class="text-sm">
                                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> View all</a>
                                        </div>
                                    </div>
                                </dd>
                            </div>

                        </dl>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
