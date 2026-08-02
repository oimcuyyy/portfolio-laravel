<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{
          darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
      }"
      x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Masuk — {{ config('app.name', 'My Portfolio') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Animasi Bola Cahaya Bergerak */
        @keyframes floatSlow {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.95); }
        }
        @keyframes floatReverse {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(-30px, 40px) scale(1.05); }
            66% { transform: translate(25px, -30px) scale(0.9); }
        }

        /* Animasi Entrance Card */
        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.96);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .animate-float-1 { animation: floatSlow 12s infinite ease-in-out; }
        .animate-float-2 { animation: floatReverse 15s infinite ease-in-out; }
        .animate-card { animation: cardEntrance 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    </style>
</head>
<body class="font-sans antialiased bg-slate-100 dark:bg-slate-950 text-slate-800 dark:text-slate-100 min-h-screen flex items-center justify-center relative overflow-hidden transition-colors duration-500">

    <!-- Ambient Floating Orbs (Background Animated) -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-indigo-500/25 dark:bg-indigo-600/20 rounded-full blur-3xl animate-float-1 pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-purple-500/25 dark:bg-purple-600/20 rounded-full blur-3xl animate-float-2 pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-blue-400/15 dark:bg-blue-600/10 rounded-full blur-3xl animate-pulse pointer-events-none"></div>

    <!-- Dark/Light Mode Toggle -->
    <div class="absolute top-6 right-6 z-50">
        <button @click="darkMode = !darkMode" type="button"
                class="p-3 rounded-2xl bg-white/70 dark:bg-slate-900/70 border border-slate-200/80 dark:border-slate-800/80 text-slate-600 dark:text-slate-300 shadow-xl backdrop-blur-md hover:scale-110 active:scale-95 transition-all duration-300 hover:shadow-indigo-500/10 cursor-pointer group"
                title="Ganti Mode Tema">
            <svg x-show="darkMode" class="w-5 h-5 text-amber-400 transition-transform duration-500 group-hover:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            <svg x-show="!darkMode" class="w-5 h-5 text-indigo-600 transition-transform duration-500 group-hover:-rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
        </button>
    </div>

    <!-- Main Glass Card -->
    <div class="w-full max-w-md mx-4 p-8 bg-white/60 dark:bg-slate-900/60 border border-white/40 dark:border-slate-800/80 rounded-3xl shadow-2xl backdrop-blur-2xl relative z-10 animate-card transition-all">

        <!-- Header & Icon -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-indigo-600/10 border border-indigo-500/20 text-indigo-600 dark:text-indigo-400 mb-4 shadow-inner hover:scale-110 transition-transform duration-300">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-black tracking-tight text-slate-900 dark:text-white">Portal Masuk</h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Masuk untuk mengakses akun portofolio kamu</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                       placeholder="nama@example.com"
                       class="w-full px-4 py-3 rounded-xl bg-white/80 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700/80 text-sm text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:scale-[1.01] outline-none transition-all duration-200 placeholder:text-slate-400">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-rose-500" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       placeholder="••••••••"
                       class="w-full px-4 py-3 rounded-xl bg-white/80 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700/80 text-sm text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:scale-[1.01] outline-none transition-all duration-200 placeholder:text-slate-400">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-rose-500" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between text-xs">
                <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="rounded border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-indigo-600 shadow-sm focus:ring-indigo-500 transition-all">
                    <span class="ms-2 text-slate-600 dark:text-slate-400 font-medium group-hover:text-slate-900 dark:group-hover:text-slate-200 transition-colors">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-indigo-600 dark:text-indigo-400 hover:underline font-semibold transition-all hover:text-indigo-500" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-indigo-600 hover:bg-indigo-500 active:scale-[0.98] text-white font-bold text-sm shadow-lg shadow-indigo-600/30 hover:shadow-indigo-500/50 transition-all duration-300 cursor-pointer flex items-center justify-center gap-2 group">
                    <span>Masuk</span>
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>
            </div>
        </form>

        <!-- Link Register Tambahan -->
        <div class="mt-5 text-center text-xs text-slate-600 dark:text-slate-400 font-medium">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-bold text-indigo-600 dark:text-indigo-400 hover:underline transition-colors">
                Daftar di sini
            </a>
        </div>

        <!-- Back Link -->
        <div class="mt-6 text-center pt-4 border-t border-slate-200/60 dark:border-slate-800/60">
            <a href="{{ url('/') }}" class="text-xs text-slate-500 dark:text-slate-400 hover:text-indigo-500 dark:hover:text-indigo-400 transition-colors duration-200 inline-flex items-center gap-1 group">
                <span class="transition-transform duration-200 group-hover:-translate-x-1">←</span> Kembali ke Portfolio Utama
            </a>
        </div>

    </div>

</body>
</html>
