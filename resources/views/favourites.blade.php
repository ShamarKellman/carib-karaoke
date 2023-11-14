<x-app-layout>
    <div class="w-full">
        <h2 class="text-center font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Favourites') }}
        </h2>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <livewire:favourites />
            </div>
        </div>
    </div>
</x-app-layout>
