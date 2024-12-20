<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $transactions = Transaction::with(['customer', 'product'])->get(); // Mengambil semua transaksi dengan relasi
        return view('transactions.index', compact('transactions'));
    }

    // Menampilkan form untuk membuat transaksi baru
    public function create()
    {
        $customers = Customer::all(); // Mengambil semua pelanggan
        $products = Product::all(); // Mengambil semua produk
        return view('transactions.create', compact('customers', 'products'));
    }

    // Menyimpan transaksi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'total_price' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        Transaction::create($request->all()); // Menyimpan data transaksi baru
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Menampilkan detail transaksi
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction')); // Mengembalikan view untuk detail transaksi
    }

    // Menampilkan form untuk mengedit transaksi
    public function edit(Transaction $transaction)
    {
        $customers = Customer::all(); // Mengambil semua pelanggan
        $products = Product::all(); // Mengambil semua produk
        return view('transactions.edit', compact('transaction', 'customers', 'products')); // Mengembalikan view untuk form edit transaksi
    }

    // Memperbarui transaksi di database
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'total_price' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        $transaction->update($request->all()); // Memperbarui data transaksi
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    // Menghapus transaksi dari database
    public function destroy(Transaction $transaction)
    {
        $transaction->delete(); // Menghapus transaksi
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
