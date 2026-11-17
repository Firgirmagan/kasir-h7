<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request): \Illuminate\View\View
    {
        $q = $request->input('q');

        $produk = [
            ['id' => 1, 'nama' => 'Kopi Ende', 'kategori' => 'Minuman', 'harga' => 15000, 'stok' => 12],
            ['id' => 2, 'nama' => 'Roti Cokelat', 'kategori' => 'Makanan', 'harga' => 8000, 'stok' => 0],
            ['id' => 3, 'nama' => 'Teh Manis', 'kategori' => 'Minuman', 'harga' => 5000, 'stok' => 20],
            ['id' => 4, 'nama' => 'Nasi Goreng', 'kategori' => 'Makanan', 'harga' => 12000, 'stok' => 5],
            ['id' => 5, 'nama' => 'Es Teh', 'kategori' => 'Minuman', 'harga' => 4000, 'stok' => 15],
            ['id' => 6, 'nama' => 'Kue Lapis', 'kategori' => 'Makanan', 'harga' => 10000, 'stok' => 8],
            ['id' => 7, 'nama' => 'Jus Jeruk', 'kategori' => 'Minuman', 'harga' => 9000, 'stok' => 10],
            ['id' => 8, 'nama' => 'Bakso Sapi', 'kategori' => 'Makanan', 'harga' => 15000, 'stok' => 3],
            ['id' => 9, 'nama' => 'Air Mineral', 'kategori' => 'Minuman', 'harga' => 3000, 'stok' => 25],
            ['id' => 10, 'nama' => 'Martabak Manis', 'kategori' => 'Makanan', 'harga' => 20000, 'stok' => 2],
        ];

        if ($q) {
            $produk = array_filter($produk, function ($item) use ($q) {
                return stripos($item['nama'], $q) !== false;
            });
        }

        return view('katalog.index', compact('produk', 'q'));
    }
}
