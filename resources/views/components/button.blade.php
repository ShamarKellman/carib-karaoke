<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-violet-600 to-pink-600 hover:from-violet-500 hover:to-pink-500 border border-transparent rounded-full font-semibold text-sm text-white tracking-wide shadow-lg shadow-violet-900/30 hover:shadow-violet-900/50 focus:outline-hidden focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 focus:ring-offset-gray-950 active:scale-95 transition-all duration-200']) }}>
    {{ $slot }}
</button>
