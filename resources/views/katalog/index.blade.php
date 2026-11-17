@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
<link rel="stylesheet" href="{{ asset('css/kasir.css') }}">

<div class="katalog-container">
    <div class="katalog-header">
        <div>
            <h1>Katalog Produk</h1>
            <p class="subtitle">Harga dan stok toko</p>
        </div>
        <a href="{{ route('katalog.index') }}" class="nav-link">Reset Filter</a>
    </div>

    <form method="GET" action="{{ route('katalog.index') }}" class="search-form">
        <label for="q">Nama produk</label>
        <input id="q" name="q" type="text" value="{{ $q ?? '' }}" placeholder="Cari produk...">
        <button type="submit">Cari</button>
    </form>

    <div class="product-horizontal-scroll">
        @forelse ($produk as $item)
            <div class="product-card">
                <h3>{{ $item['nama'] }}</h3>
                <p class="category">Kategori: {{ $item['kategori'] }}</p>
                <p class="price">Rp {{ number_format($item['harga'], 0, ',', '.') }}</p>
                <p class="stock">Stok: {{ $item['stok'] }}</p>
            </div>
        @empty
            <p class="empty-msg">Produk tidak ditemukan.</p>
        @endforelse
    </div>
</div>
@endsection
