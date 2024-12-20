<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::with('category')->get(); // Mengambil semua produk dengan kategori
        return view('products.index', compact('products'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        $categories = Category::all(); // Mengambil semua kategori
        return view('products.create', compact('categories'));
    }

    // Menyimpan produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($request->all()); // Menyimpan data produk baru
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan detail produk
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        $categories = Category::all(); // Mengambil semua kategori
        return view('products.edit', compact('product', 'categories'));
    }

    // Memperbarui produk di database
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($request->all()); // Memperbarui data produk
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk dari database
    public function destroy(Product $product)
    {
        $product->delete(); // Menghapus produk
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
