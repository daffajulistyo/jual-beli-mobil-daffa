@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Transaksi</h1>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_id">Pelanggan</label>
            <select class="form-control" id="customer_id" name="customer_id" required>
                <option value="">Pilih Pelanggan</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="product_id">Produk</label>
            <select class="form-control" id="product_id" name="product_id" required>
                <option value="">Pilih Produk</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="total_price">Total Harga</label>
            <input type="number" class="form-control" id="total_price" name="total_price" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="transaction_date">Tanggal Transaksi</label>
            <input type="date" class="form-control" id="transaction_date" name="transaction_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
