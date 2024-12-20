<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index()
    {
        $customers = Customer::all(); // Mengambil semua pelanggan
        return view('customers.index', compact('customers'));
    }

    // Menampilkan form untuk membuat pelanggan baru
    public function create()
    {
        return view('customers.create'); // Mengembalikan view untuk form pembuatan pelanggan
    }

    // Menyimpan pelanggan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Customer::create($request->all()); // Menyimpan data pelanggan baru
        return redirect()->route('customers.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Menampilkan detail pelanggan
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer')); // Mengembalikan view untuk detail pelanggan
    }

    // Menampilkan form untuk mengedit pelanggan
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer')); // Mengembalikan view untuk form edit pelanggan
    }

    // Memperbarui pelanggan di database
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $customer->update($request->all()); // Memperbarui data pelanggan
        return redirect()->route('customers.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    // Menghapus pelanggan dari database
    public function destroy(Customer $customer)
    {
        $customer->delete(); // Menghapus pelanggan
        return redirect()->route('customers.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
