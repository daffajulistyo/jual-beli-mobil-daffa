@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kategori</h1>
    
    <!-- Form untuk mengedit kategori -->
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menggunakan metode PUT untuk update -->
        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $category->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
