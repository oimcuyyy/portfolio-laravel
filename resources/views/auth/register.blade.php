<!DOCTYPE html>
<html lang="id"
      x-data="{ darkMode: localStorage.getItem('theme') === 'light' ? false : true }"
      x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))"
      :class="{ 'dark': darkMode }"
      class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — My Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 dark:bg-[#090d16] text-slate-800 dark:text-slate-100 min-h-screen selection:bg-indigo-500 selection:text-white flex items-center justify-center p-4 sm:p-6 transition-colors duration-300 relative overflow-x-hidden">

    <!-- Background Ambient Glow Effects -->
    <div class="fixed top-1/4 left-1/2 -translate-x-1/2 w-[500px] h-[300px] bg-indigo-600/15 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="fixed bottom-10 right-10 w-[300px] h-[300px] bg-purple-600/10 rounded-full blur-[100px] pointer-events-none"></div>

    <!-- Container Card Register -->
    <div class="w-full max-w-md bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800/80 rounded-3xl p-8 shadow-xl shadow-slate-200/50 dark:shadow-none backdrop-blur-xl relative z-10 transition-colors duration-300">

        <!-- Header: Logo & Toggle Theme -->
        <div class="flex items-center justify-between mb-8">
            <a href="{{ url('/') }}" class="text-xl font-black tracking-tight text-slate-900 dark:text-white hover:opacity-80 transition-opacity">
                My<span class="text-indigo-600 dark:text-indigo-400">.Portfolio</span>
            </a>

            <!-- Tombol Toggle Dark / Light Mode -->
            <button @click="darkMode = !darkMode"
                    type="button"
                    class="p-2 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-amber-400 border border-slate-200 dark:border-slate-700/60 hover:scale-105 active:scale-95 transition-all cursor-pointer flex items-center justify-center"
                    title="Ganti Mode Tema">
                <!-- Icon Matahari (Dark Mode) -->
                <svg x-show="darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <!-- Icon Bulan (Light Mode) -->
                <svg x-show="!darkMode" class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                </svg>
            </button>
        </div>

        <!-- Title -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Buat Akun Baru</h1>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Daftar untuk mengakses sistem dan fitur portofolio.</p>
        </div>

        <!-- Form Register -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Nama Lengkap</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                       placeholder="Masukkan nama lengkap"
                       class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder:text-slate-400 dark:placeholder:text-slate-500">
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Alamat Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                       placeholder="nama@email.com"
                       class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder:text-slate-400 dark:placeholder:text-slate-500">
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                       placeholder="••••••••"
                       class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder:text-slate-400 dark:placeholder:text-slate-500">
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label for="password_confirmation" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                       placeholder="••••••••"
                       class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder:text-slate-400 dark:placeholder:text-slate-500">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full py-3 px-4 mt-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-sm transition-all shadow-lg shadow-indigo-500/25 hover:scale-[1.02] active:scale-[0.98] cursor-pointer">
                Daftar Sekarang
            </button>
        </form>

        <!-- Footer Link -->
        <div class="mt-6 text-center text-xs text-slate-500 dark:text-slate-400">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-bold text-indigo-600 dark:text-indigo-400 hover:underline">
                Masuk di sini
            </a>
        </div>
    </div>

</body>
</html>
