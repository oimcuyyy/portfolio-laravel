<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin beserta daftar project
     */
    public function index()
    {
        // Mengambil semua project diurutkan dari yang terbaru
        $projects = Project::latest()->get();

        // Mengembalikan ke view dashboard.blade.php
        return view('dashboard', compact('projects'));
    }

    /**
     * Menyimpan project baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'tech_stack'  => 'required|string|max:255',
            'description' => 'required|string',
            'link'        => 'nullable|url',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_url'   => 'nullable|url',
        ]);

        // Simpan gambar jika di-upload (prioritas file lokal)
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        } elseif (!empty($validated['image_url'])) {
            // Jika tidak ada file upload tapi ada link HTTPS, pakai linknya
            $validated['image'] = $validated['image_url'];
        }

        // Hapus key image_url karena di DB kolomnya cuma 'image'
        unset($validated['image_url']);

        Project::create($validated);

        return redirect()->back()->with('success', 'Project berhasil ditambahkan!');
    }

    /**
     * Menghapus project dari database
     */
    public function destroy(Project $project)
    {
        // Hapus file gambar dari storage jika ada
        if ($project->image && !str_starts_with($project->image, 'http')) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->back()->with('success', 'Project berhasil dihapus!');
    }
}
