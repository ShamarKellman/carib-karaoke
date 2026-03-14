<x-app-layout>
    <div class="self-stretch grid grid-rows-1 grid-cols-1 md:grid-cols-2 gap-6 md:gap-4 items-center justify-center">
        <div>
            <h1 class="text-5xl md:text-7xl">{{ __('default.hero_text') }}</h1>
            <p class="my-10 text-lg">{{ __('default.hero_sub_text') }}</p>
            <x-button class="text-xl!" onclick="location.href='{{ route('search') }}'">{{ __('Start Singing') }}</x-button>
        </div>
        <div>
            <img src="/images/hero.webp" alt="hero image" class="rounded-3xl">
        </div>
    </div>
</x-app-layout>
