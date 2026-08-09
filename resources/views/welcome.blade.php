<!DOCTYPE html>
<html lang="id"
      x-data="{
          darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
          toggleTheme() {
              this.darkMode = !this.darkMode;
              localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
              if (this.darkMode) {
                  document.documentElement.classList.add('dark');
              } else {
                  document.documentElement.classList.remove('dark');
              }
          }
      }"
      x-init="if (darkMode) document.documentElement.classList.add('dark')"
      :class="{ 'dark': darkMode }"
      class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Portfolio — Muhammad Rochimuloh</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['figtree', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 dark:bg-[#090d16] text-slate-800 dark:text-slate-100 font-sans antialiased transition-colors duration-300 min-h-screen">

    <!-- NAVBAR -->
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                My<span class="text-indigo-600 dark:text-indigo-500">.Portfolio</span>
            </span>
        </div>

        <div class="flex items-center gap-3">
            <!-- Tombol Toggle Mode (Dark / Light) -->
            <button @click="toggleTheme()"
                    type="button"
                    class="p-2.5 rounded-xl bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-300 dark:hover:bg-slate-700 transition-all duration-200 border border-slate-300 dark:border-slate-700 shadow-sm focus:outline-none cursor-pointer flex items-center justify-center"
                    title="Ganti Mode Tema">
                <!-- Icon Sun (Muncul saat Dark Mode) -->
                <svg x-show="darkMode" class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <!-- Icon Moon (Muncul saat Light Mode) -->
                <svg x-show="!darkMode" class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                </svg>
            </button>

            <!-- Tombol Ke Dashboard / Login / Register -->
            <div class="flex items-center gap-2">
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->is_admin)
                            <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm transition-all duration-300 shadow-lg shadow-indigo-500/25">
                                Dashboard Admin
                            </a>
                        @else
                            <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm transition-all duration-300 shadow-lg shadow-indigo-500/25">
                                Dashboard
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2.5 rounded-xl bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-200 font-semibold text-sm transition-all hover:bg-slate-300 dark:hover:bg-slate-700">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm transition-all duration-300 shadow-lg shadow-indigo-500/25">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- MAIN BENTO GRID CONTAINER -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 space-y-4">

        <!-- ROW 1: Hero Profile + Image + Tech Stack -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">

            <!-- HERO CARD (6 Cols) -->
            <div class="lg:col-span-6 p-8 rounded-3xl bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800/80 shadow-sm relative overflow-hidden flex flex-col justify-between hover:-translate-y-1 transition-all duration-300">
                <div class="absolute -right-12 -bottom-12 w-56 h-56 bg-indigo-500/10 dark:bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>

                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 border border-indigo-200 dark:border-indigo-500/20 text-xs font-semibold">
                        <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                        Software Engineering Student
                    </span>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-4 tracking-tight">
                        Muhammad Rochimuloh
                    </h1>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed max-w-md">
                        Siswa SMKN 20 Jakarta yang berfokus pada <strong class="text-slate-800 dark:text-slate-200">Modern Web Development</strong>, Laravel ecosystem, dan perancangan UI/UX interaktif.
                    </p>
                </div>

                <div class="flex items-center gap-3 mt-8">
                    <a href="#projects" class="px-5 py-2.5 rounded-xl bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-semibold text-xs hover:bg-slate-800 dark:hover:bg-slate-100 transition-all shadow-md">
                        Lihat Project ↓
                    </a>
                </div>
            </div>

            <!-- PHOTO CARD (3 Cols) -->
            <div class="lg:col-span-3 p-6 rounded-3xl bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800/80 shadow-sm flex flex-col items-center text-center justify-between hover:-translate-y-1 transition-all duration-300">
                <div class="w-full h-48 rounded-2xl overflow-hidden bg-slate-100 dark:bg-slate-800 relative">
                    <img src="https://via.placeholder.com/300x300" alt="Muhammad Rochimuloh" class="w-full h-full object-cover">
                </div>
                <div class="mt-4">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">Developer Profile</span>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white">Muhammad Rochimuloh</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Fullstack Web Developer Trainee</p>
                </div>
            </div>

            <!-- TECH STACK CARD (3 Cols) -->
            <div class="lg:col-span-3 p-6 rounded-3xl bg-gradient-to-br from-indigo-600 via-indigo-700 to-purple-800 text-white shadow-xl flex flex-col justify-between hover:-translate-y-1 transition-all duration-300">
                <div>
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-indigo-200">Tech Stack</span>
                        <span class="text-amber-300">⚡</span>
                    </div>
                    <p class="text-xs text-indigo-100 mt-1">Teknologi utama yang saya kuasai:</p>
                </div>

                <div class="grid grid-cols-2 gap-2 mt-6">
                    <div class="p-2.5 rounded-xl bg-white/10 backdrop-blur-md border border-white/10 text-xs font-semibold text-center">Laravel 13</div>
                    <div class="p-2.5 rounded-xl bg-white/10 backdrop-blur-md border border-white/10 text-xs font-semibold text-center">Tailwind</div>
                    <div class="p-2.5 rounded-xl bg-white/10 backdrop-blur-md border border-white/10 text-xs font-semibold text-center">Alpine.js</div>
                    <div class="p-2.5 rounded-xl bg-white/10 backdrop-blur-md border border-white/10 text-xs font-semibold text-center">SQLite</div>
                </div>
            </div>

        </div>

        <!-- ROW 2: Status + Education + Featured Project -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">

            <!-- STATUS CARD -->
            <div class="lg:col-span-3 p-5 rounded-3xl bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800/80 shadow-sm flex items-center gap-3 hover:-translate-y-1 transition-all duration-300">
                <span class="relative flex h-3 w-3">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                </span>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Status</span>
                    <span class="text-xs font-extrabold text-emerald-600 dark:text-emerald-400">Available for Freelance</span>
                </div>
            </div>

            <!-- EDUCATION CARD -->
            <div class="lg:col-span-4 p-5 rounded-3xl bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800/80 shadow-sm flex items-center justify-between hover:-translate-y-1 transition-all duration-300">
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Pendidikan</span>
                    <h4 class="text-sm font-bold text-slate-900 dark:text-white">SMK Negeri 20 Jakarta</h4>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400">Rekayasa Perangkat Lunak</p>
                </div>
                <div class="p-2 rounded-xl bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-xs font-bold">
                    SMK 20
                </div>
            </div>

            <!-- FEATURED PROJECT CARD -->
            <div class="lg:col-span-5 p-5 rounded-3xl bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800/80 shadow-sm flex items-center justify-between hover:-translate-y-1 transition-all duration-300">
                <div>
                    <span class="text-[10px] font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider block">Featured Project</span>
                    <h4 class="text-sm font-bold text-slate-900 dark:text-white">Bento Grid Portfolio & Admin</h4>
                </div>
                <span class="px-3 py-1 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xs font-semibold">
                    Laravel 13
                </span>
            </div>

        </div>

        <!-- ROW 3: Projects Section -->
        <div id="projects" class="pt-2">
            <div class="p-8 rounded-3xl bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800/80 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <span class="text-[10px] font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider block">Portfolio Showcase</span>
                        <h3 class="text-xl font-extrabold text-slate-900 dark:text-white mt-1">Daftar Project</h3>
                    </div>
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400">
                    Kumpulan project web development dan perancangan antarmuka yang sedang dan telah dikembangkan.
                </p>
            </div>
        </div>

    </main>

</body>
</html>
