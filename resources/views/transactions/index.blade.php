@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Transaksi</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Produk</th>
                <th>Total Harga</th>
                <th>Tanggal Transaksi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->customer->name }}</td>
                <td>{{ $transaction->product->name }}</td>
                <td>{{ number_format($transaction->total_price, 2) }}</td>
                <td>{{ $transaction->transaction_date }}</td>
                <td>
                    <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
