<x-app-layout>
    <div class="self-stretch grid grid-cols-1 md:grid-cols-2 gap-12 items-center py-8 md:py-16">
        <div class="flex flex-col gap-6">
            <div class="inline-flex w-fit items-center gap-2 px-4 py-1.5 rounded-full bg-violet-500/10 border border-violet-500/20 text-violet-400 text-sm font-medium">
                🎤 Caribbean Karaoke
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight bg-gradient-to-br from-white via-violet-200 to-pink-300 bg-clip-text text-transparent">
                {{ __('default.hero_text') }}
            </h1>
            <p class="text-lg text-gray-400">{{ __('default.hero_sub_text') }}</p>
            <div>
                <x-button class="text-base!" onclick="location.href='{{ route('search') }}'">
                    {{ __('Start Singing') }}
                </x-button>
            </div>
        </div>
        <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-r from-violet-600/30 to-pink-600/20 blur-3xl rounded-3xl scale-105"></div>
            <img src="/images/hero.webp" alt="hero image" class="relative rounded-3xl shadow-2xl shadow-black/50">
        </div>
    </div>
</x-app-layout>
