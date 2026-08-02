<!DOCTYPE html>
<html lang="id"
      x-data="{ darkMode: localStorage.getItem('theme') === 'light' ? false : true }"
      x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))"
      :class="{ 'dark': darkMode }"
      class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio — Muhammad Rochimuloh</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 dark:bg-[#090d16] text-slate-800 dark:text-slate-100 min-h-screen selection:bg-indigo-500 selection:text-white antialiased py-8 px-4 sm:px-6 transition-colors duration-300">

    <!-- Background Ambient Glow -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[800px] h-[350px] bg-indigo-600/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-6xl mx-auto relative z-10">

        <!-- Header / Navbar -->
        <header class="flex items-center justify-between pb-6 mb-8 border-b border-slate-200 dark:border-slate-800/80 transition-colors">
            <a href="#" class="text-2xl font-black tracking-tight text-slate-900 dark:text-white hover:opacity-80 transition-opacity">
                My<span class="text-indigo-600 dark:text-indigo-400">.Portfolio</span>
            </a>

            <div class="flex items-center gap-3">
                <!-- Tombol Toggle Dark / Light Mode -->
                <button @click="darkMode = !darkMode"
                        type="button"
                        class="p-2.5 rounded-xl bg-slate-200 dark:bg-slate-800/80 text-slate-700 dark:text-amber-400 border border-slate-300 dark:border-slate-700/60 shadow-sm hover:scale-105 active:scale-95 transition-all cursor-pointer flex items-center justify-center"
                        title="Ganti Mode Tema">
                    <!-- Icon Matahari (Dark Mode) -->
                    <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <!-- Icon Bulan (Light Mode) -->
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm transition-all shadow-lg shadow-indigo-500/20">
                            Dashboard Admin
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm transition-all shadow-lg shadow-indigo-500/20 hover:scale-105 inline-block">
                            Login Admin
                        </a>
                    @endauth
                @endif
            </div>
        </header>

        <!-- Bento Grid Layout -->
        <main class="grid grid-cols-1 md:grid-cols-4 gap-4 auto-rows-[190px]">

            <!-- 1. Hero Bio (2 Col x 2 Row) -->
            <div class="md:col-span-2 md:row-span-2 p-8 rounded-3xl bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800/80 shadow-sm flex flex-col justify-between hover:border-slate-300 dark:hover:border-slate-700 transition-all relative overflow-hidden group">
                <div class="absolute right-0 bottom-0 w-1/2 h-full opacity-10 group-hover:opacity-20 transition-opacity pointer-events-none">
                    <img src="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=600&auto=format&fit=crop" alt="Abstract Background" class="w-full h-full object-cover">
                </div>

                <div class="relative z-10">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-600 dark:text-indigo-400 text-xs font-semibold mb-6">
                        <span class="w-2 h-2 rounded-full bg-indigo-500 dark:bg-indigo-400 animate-pulse"></span>
                        Software Engineering Student
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mb-3 leading-tight">
                        Muhammad Rochimuloh
                    </h1>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed max-w-md">
                        Siswa SMKN 20 Jakarta yang berfokus pada <span class="text-slate-800 dark:text-slate-200 font-medium">Modern Web Development</span>, Laravel ecosystem, dan perancangan UI/UX interaktif.
                    </p>
                </div>

                <div class="flex items-center gap-3 pt-4 relative z-10">
                    <a href="#projects" class="px-5 py-2.5 rounded-xl bg-slate-900 dark:bg-white text-white dark:text-slate-900 hover:bg-slate-800 dark:hover:bg-slate-200 font-bold text-xs transition-all shadow-md">
                        Lihat Project ↓
                    </a>
                    <a href="https://github.com" target="_blank" class="p-2.5 rounded-xl bg-slate-100 dark:bg-slate-800 hover:bg-indigo-600 dark:hover:bg-indigo-600 text-slate-700 dark:text-slate-300 hover:text-white border border-slate-200 dark:border-slate-700/50 transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="p-2.5 rounded-xl bg-slate-100 dark:bg-slate-800 hover:bg-indigo-600 dark:hover:bg-indigo-600 text-slate-700 dark:text-slate-300 hover:text-white border border-slate-200 dark:border-slate-700/50 transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                </div>
            </div>

            <!-- 2. Developer Profile Card (1 Col x 2 Row) -->
            <div class="md:row-span-2 p-6 rounded-3xl bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800/80 shadow-sm flex flex-col justify-between hover:border-slate-300 dark:hover:border-slate-700 transition-all overflow-hidden">
                <div class="relative w-full h-52 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700/50 bg-slate-100 dark:bg-slate-800 shrink-0">
                    <img
                        src="{{ asset('images/profile.jpg') }}"
                        alt="Muhammad Rochimuloh"
                        class="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-500"
                    />
                </div>
                <div>
                    <span class="text-[10px] font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-widest block">Developer Profile</span>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white mt-1">Muhammad Rochimuloh</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Fullstack Web Developer Trainee</p>
                </div>
            </div>

            <!-- 3. Tech Stack Card (1 Col x 2 Row) -->
            <div class="md:row-span-2 p-6 rounded-3xl bg-gradient-to-br from-indigo-600 via-indigo-700 to-purple-800 text-white shadow-xl shadow-indigo-600/10 flex flex-col justify-between relative overflow-hidden group">
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-indigo-200">Tech Stack</span>
                        <span class="text-sm animate-bounce">⚡</span>
                    </div>
                    <p class="text-xs text-indigo-100/80">Teknologi utama yang saya kuasai:</p>
                </div>

                <div class="relative z-10 my-3 w-full h-28 rounded-2xl overflow-hidden border border-white/10 bg-indigo-950/40 group-hover:scale-105 transition-transform duration-300">
                    <img
                        src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?q=80&w=400&auto=format&fit=crop"
                        alt="Tech Illustration"
                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/80 via-transparent to-transparent"></div>
                    <span class="absolute bottom-2 left-3 text-[10px] font-semibold text-indigo-200 tracking-wide">Modern Web Ecosystem</span>
                </div>

                <div class="grid grid-cols-2 gap-2 relative z-10">
                    <div class="flex items-center gap-2 p-2 rounded-xl bg-white/10 border border-white/10 backdrop-blur-sm">
                        <span class="text-base">🔴</span>
                        <span class="text-xs font-semibold">Laravel 13</span>
                    </div>
                    <div class="flex items-center gap-2 p-2 rounded-xl bg-white/10 border border-white/10 backdrop-blur-sm">
                        <span class="text-base">🌊</span>
                        <span class="text-xs font-semibold">Tailwind</span>
                    </div>
                    <div class="flex items-center gap-2 p-2 rounded-xl bg-white/10 border border-white/10 backdrop-blur-sm">
                        <span class="text-base">🚀</span>
                        <span class="text-xs font-semibold">Alpine.js</span>
                    </div>
                    <div class="flex items-center gap-2 p-2 rounded-xl bg-white/10 border border-white/10 backdrop-blur-sm">
                        <span class="text-base">🗄️</span>
                        <span class="text-xs font-semibold">SQLite</span>
                    </div>
                </div>
            </div>

            <!-- 4. Status Card (1 Col x 1 Row) -->
            <div class="p-5 rounded-3xl bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800/80 shadow-sm flex items-center justify-between gap-3 hover:border-emerald-500/40 transition-all group overflow-hidden relative">
                <div class="flex flex-col justify-between h-full relative z-10">
                    <div class="flex items-center gap-2">
                        <span class="relative flex h-2.5 w-2.5">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                        </span>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-600 dark:text-emerald-400">Status</span>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white">Available for Work</h3>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Freelance & Magang</p>
                    </div>
                </div>

                <div class="w-14 h-14 rounded-2xl overflow-hidden border border-emerald-500/20 shrink-0 relative group-hover:scale-110 transition-transform duration-300">
                    <img
                        src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=200&auto=format&fit=crop"
                        alt="Work Status"
                        class="w-full h-full object-cover"
                    />
                </div>
            </div>

            <!-- 5. Education Card (SMKN 20) -->
            <div class="p-5 rounded-3xl bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800/80 shadow-sm flex items-center gap-3 hover:border-slate-300 dark:hover:border-slate-700 transition-all overflow-hidden group">
                <div class="w-16 h-16 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700/60 bg-slate-100 dark:bg-slate-800 shrink-0">
                    <img
                        src="{{ asset('images/smkn20.jpg') }}"
                        alt="SMKN 20 Jakarta"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                    />
                </div>
                <div class="flex flex-col justify-center">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">Pendidikan</span>
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white mt-0.5">SMK Negeri 20 Jakarta</h3>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400">Rekayasa Perangkat Lunak</p>
                </div>
            </div>

            <!-- 6. DYNAMIC PROJECTS FROM DATABASE -->
            @forelse($projects as $project)
                <div id="projects" class="md:col-span-2 p-5 rounded-3xl bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800/80 shadow-sm flex items-center justify-between gap-4 hover:border-indigo-500/40 transition-all overflow-hidden group">
                    <div class="flex flex-col justify-between h-full max-w-[65%]">
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-[10px] font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">Project</span>
                                <span class="text-[10px] px-2 py-0.5 rounded-full bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 font-medium">
                                    {{ $project->tech_stack }}
                                </span>
                            </div>
                            <h3 class="text-base font-bold text-slate-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-300 transition-colors line-clamp-1">
                                {{ $project->title }}
                            </h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 line-clamp-2">
                                {{ $project->description }}
                            </p>
                        </div>

                        @if($project->link)
                            <a href="{{ $project->link }}" target="_blank" class="inline-flex items-center gap-1 text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:underline mt-2">
                                <span>Lihat Live / Code</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        @endif
                    </div>

                    <div class="w-32 h-full rounded-2xl bg-indigo-950/50 border border-indigo-500/20 overflow-hidden shrink-0 relative group-hover:scale-105 transition-transform duration-300">
                        <img
                            src="{{ $project->image ? (str_starts_with($project->image, 'http') ? $project->image : asset('storage/' . $project->image)) : 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=400&auto=format&fit=crop' }}"
                            alt="{{ $project->title }}"
                            class="w-full h-full object-cover object-top opacity-90 group-hover:opacity-100 transition-opacity"
                        />
                    </div>
                </div>
            @empty
                <!-- Standby Card Jika Belum Ada Project Di-input -->
                <div id="projects" class="md:col-span-2 p-5 rounded-3xl bg-white dark:bg-slate-900/80 border border-dashed border-slate-300 dark:border-slate-800 shadow-sm flex items-center justify-center text-center">
                    <div>
                        <p class="text-xs font-semibold text-slate-500 dark:text-slate-400">Belum ada project yang ditambahkan.</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Tambahkan project baru dari <a href="{{ route('dashboard') }}" class="text-indigo-600 dark:text-indigo-400 underline">Dashboard Admin</a>!</p>
                    </div>
                </div>
            @endforelse

        </main>

        <!-- Footer -->
        <footer class="mt-10 text-center text-xs text-slate-400 dark:text-slate-500">
            &copy; {{ date('Y') }} Muhammad Rochimuloh. Created with Laravel & Tailwind.
        </footer>
    </div>

</body>
</html>
