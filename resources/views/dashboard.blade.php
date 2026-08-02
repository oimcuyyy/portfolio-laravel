<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 dark:text-slate-100 leading-tight flex items-center justify-between">
            <span>{{ __('Dashboard Admin') }}</span>
            <a href="{{ url('/') }}" target="_blank" class="text-xs bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-xl transition-all shadow-md flex items-center gap-1.5 font-semibold">
                <span>Lihat Live Portfolio</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Flash Message Success -->
            @if (session('success'))
                <div class="p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-2xl flex items-center gap-3 text-sm font-semibold">
                    <span>✨ {{ session('success') }}</span>
                </div>
            @endif

            <!-- Banner Welcome Statis -->
            <div class="p-8 rounded-3xl bg-slate-900/90 border border-slate-800 text-white relative overflow-hidden shadow-xl">
                <div class="relative z-10">
                    <span class="inline-block px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold mb-4">
                        System Active & Updated
                    </span>
                    <h1 class="text-2xl sm:text-3xl font-extrabold mb-2">
                        Selamat Datang Kembali, {{ Auth::user()->name }}! 👋
                    </h1>
                    <p class="text-slate-400 text-sm max-w-xl leading-relaxed">
                        Dari sini Anda dapat memasukkan project baru, merapikan deskripsi, serta mengelola data portofolio secara real-time.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- FORM TAMBAH PROJECT (1 Column) -->
                <div class="lg:col-span-1 p-6 rounded-3xl bg-slate-900/80 border border-slate-800/80 text-white shadow-lg h-fit">
                    <h3 class="text-lg font-bold text-white mb-1 flex items-center gap-2">
                        <span>➕ Tambah Project Baru</span>
                    </h3>
                    <p class="text-xs text-slate-400 mb-5">Isi detail project baru untuk ditambahkan.</p>

                    <!-- Ditambahkan enctype="multipart/form-data" untuk support upload file -->
                    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Judul Project</label>
                            <input type="text" name="title" required placeholder="Contoh: E-Commerce App"
                                   class="w-full px-4 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-sm text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder:text-slate-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Tech Stack</label>
                            <input type="text" name="tech_stack" required placeholder="Contoh: Laravel 13, Tailwind, Vue"
                                   class="w-full px-4 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-sm text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder:text-slate-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Link Live / GitHub (Opsional)</label>
                            <input type="url" name="link" placeholder="https://github.com/..."
                                   class="w-full px-4 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-sm text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder:text-slate-500">
                        </div>

                        <!-- Field Upload Gambar Baru -->
                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Gambar / Thumbnail Project (Opsional)</label>
                            <input type="file" name="image" accept="image/*"
                                   class="w-full text-xs text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-500 bg-slate-800/80 rounded-xl border border-slate-700 cursor-pointer">
                            <p class="text-[10px] text-slate-500 mt-1">Format: JPG, PNG, WEBP (Maks. 2MB)</p>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Deskripsi Short</label>
                            <textarea name="description" rows="3" required placeholder="Deskripsi singkat mengenai fitur & pengerjaan project..."
                                      class="w-full px-4 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-sm text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder:text-slate-500 resize-none"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3 px-4 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-sm shadow-lg shadow-indigo-600/30 transition-all cursor-pointer">
                            Simpan Project
                        </button>
                    </form>
                </div>

                <!-- TABEL DAFTAR PROJECT (2 Columns) -->
                <div class="lg:col-span-2 p-6 rounded-3xl bg-slate-900/80 border border-slate-800/80 text-white shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-white">📁 Daftar Project Kamu</h3>
                            <p class="text-xs text-slate-400">Total: {{ $projects->count() }} Project Terdaftar</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-slate-300">
                            <thead class="text-xs uppercase bg-slate-800/60 text-slate-400 border-b border-slate-700/60">
                                <tr>
                                    <th class="py-3 px-4 rounded-l-xl">Project</th>
                                    <th class="py-3 px-4">Tech Stack</th>
                                    <th class="py-3 px-4 text-center rounded-r-xl">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/60">
                                @forelse($projects as $project)
                                    <tr class="hover:bg-slate-800/40 transition-colors">
                                        <td class="py-4 px-4 font-semibold text-white">
                                            <div class="flex items-center gap-3">
                                                <!-- Preview Gambar Mini di Tabel -->
                                                <div class="w-10 h-10 rounded-lg bg-slate-800 border border-slate-700 overflow-hidden shrink-0">
                                                    <img src="{{ $project->image ? (str_starts_with($project->image, 'http') ? $project->image : asset('storage/' . $project->image)) : 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=200&auto=format&fit=crop' }}"
                                                         alt="{{ $project->title }}"
                                                         class="w-full h-full object-cover">
                                                </div>
                                                <div>
                                                    <div class="line-clamp-1">{{ $project->title }}</div>
                                                    <div class="text-xs font-normal text-slate-400 line-clamp-1 mt-0.5">{{ $project->description }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-4">
                                            <span class="px-2.5 py-1 rounded-md bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-medium inline-block">
                                                {{ $project->tech_stack }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-4 text-center">
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus project ini?')" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 rounded-lg bg-rose-500/10 text-rose-400 hover:bg-rose-500/20 border border-rose-500/20 text-xs font-semibold transition-all cursor-pointer">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-8 text-center text-slate-500 text-xs">
                                            Belum ada project yang ditambahkan. Silakan gunakan form di samping!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
