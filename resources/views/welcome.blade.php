<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Portfolio — Muhammad Rochimuloh</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-900 text-slate-100 font-sans antialiased min-h-screen">

    <nav class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
        <span class="text-2xl font-black text-white">My<span class="text-indigo-500">.Portfolio</span></span>
        <a href="/login" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-lg shadow-indigo-500/25">Log in</a>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-8 space-y-6">
        <div class="p-10 rounded-3xl bg-slate-800/80 border border-slate-700 shadow-xl">
            <span class="px-3 py-1 rounded-full bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 text-xs font-semibold">Software Engineering Student</span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white mt-4 tracking-tight">Muhammad Rochimuloh</h1>
            <p class="text-slate-300 text-base mt-4 max-w-2xl leading-relaxed">
                Siswa SMKN 20 Jakarta yang berfokus pada <strong class="text-white">Modern Web Development</strong>, Laravel ecosystem, dan perancangan UI/UX interaktif.
            </p>
            <div class="mt-8">
                <a href="#projects" class="px-6 py-3 rounded-xl bg-white text-slate-900 font-bold text-sm shadow-md hover:bg-slate-100 transition">Lihat Project ↓</a>
            </div>
        </div>

        <div id="projects" class="p-8 rounded-3xl bg-slate-800/80 border border-slate-700 shadow-xl">
            <h3 class="text-2xl font-extrabold text-white">Daftar Project</h3>
            <p class="text-slate-400 text-sm mt-2">Kumpulan project web development saya.</p>
        </div>
    </main>

</body>
</html>
