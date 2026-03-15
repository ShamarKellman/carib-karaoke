@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-800 border-white/10 text-white placeholder-gray-500 focus:border-violet-500 focus:ring-violet-500/30 rounded-lg shadow-none disabled:opacity-50 disabled:cursor-not-allowed']) !!}>
