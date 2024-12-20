<?php

namespace App\Http\Controllers;

use App\Models\Category; // Pastikan model Category sudah ada
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $categories = Category::all(); // Mengambil semua kategori
        return view('categories.index', compact('categories')); // Mengembalikan view dengan data kategori
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('categories.create'); // Mengembalikan view untuk form pembuatan kategori
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all()); // Menyimpan data kategori baru
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.'); // Redirect ke index dengan pesan sukses
    }

    // Menampilkan detail kategori
    public function show(Category $category)
    {
        return view('categories.show', compact('category')); // Mengembalikan view untuk detail kategori
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category')); // Mengembalikan view untuk form edit kategori
    }

    // Memperbarui kategori di database
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all()); // Memperbarui data kategori
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.'); // Redirect ke index dengan pesan sukses
    }

    // Menghapus kategori dari database
    public function destroy(Category $category)
    {
        $category->delete(); // Menghapus kategori
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.'); // Redirect ke index dengan pesan sukses
    }
}
