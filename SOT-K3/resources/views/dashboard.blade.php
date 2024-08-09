<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Section 1: Input SOT Finding -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 3a2 2 0 00-2 2v12a2 2 0 002 2h18a2 2 0 002-2V5a2 2 0 00-2-2M3 3l9 9-9 9"></path></svg>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">{{ __('Input SOT Finding') }}</h3>
                        <p>{{ __('Upload new SOT findings with photos.') }}</p>
                        <a href="{{ route('findings.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">{{ __('View Findings') }}</a>
                    </div>
                </div>
            </div>

            <!-- Section 2: List of Findings -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M3 10h18M3 15h18M3 20h18"></path></svg>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">{{ __('List of Findings') }}</h3>
                        <p>{{ __('View all your SOT findings.') }}</p>
                        <a href="{{route('findings.my')}}" class="text-indigo-600 dark:text-indigo-400 hover:underline">{{ __('View Findings') }}</a>
                    </div>
                </div>
            </div>

            <!-- Section 3: List of All Users Findings -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"></path></svg>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">{{ __('List of All Users Findings') }}</h3>
                        <p>{{ __('See what other users have found.') }}</p>
                        <a href="{{route('findings.all')}}" class="text-indigo-600 dark:text-indigo-400 hover:underline">{{ __('View All Findings') }}</a>
                    </div>
                </div>
            </div>

            <!-- Section 4: Summary -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h-6a2 2 0 00-2 2v6a2 2 0 002 2h6m0-4H9m2 0h6m0-4H9m2 0h6m0-4H9m2 0h6m0-4H9m2 0h6m0 4h6a2 2 0 012 2v6a2 2 0 01-2 2h-6"></path></svg>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">{{ __('Summary') }}</h3>
                        <p>{{ __('Get a summary of your activities.') }}</p>
                        <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:underline">{{ __('View Summary') }}</a>
                    </div>
                </div>
            </div>

            <!-- Section 5: User Profile -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17a4 4 0 00-8 0m8-6a4 4 0 01-8 0m8 6v1a2 2 0 002 2h3m-9-9a2 2 0 00-2-2H5a2 2 0 00-2 2v9h18v-1a2 2 0 00-2-2h-3m-6 6a2 2 0 01-2-2h6a2 2 0 01-2 2h-2m6-6a2 2 0 002 2h3m-9-9a2 2 0 00-2-2H5a2 2 0 00-2 2v9h18v-1a2 2 0 00-2-2h-3m-6 6a2 2 0 01-2-2h6a2 2 0 01-2 2h-2m6-6a2 2 0 002 2h3"></path></svg>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">{{ __('User Profile') }}</h3>
                        <p>{{ __('Manage your profile settings.') }}</p>
                        <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:underline">{{ __('Edit Profile') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
