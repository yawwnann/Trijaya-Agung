<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class KategoriProdukSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriList = [
            'Semen',
            'Cat',
            'Paku',
            'Kayu',
            'Besi',
            'Keramik',
            'Pipa',
            'Kunci',
            'Obeng',
            'Gergaji',
        ];

        foreach ($kategoriList as $kategori) {
            $kategoriModel = KategoriProduk::create([
                'nama' => $kategori,
                'slug' => Str::slug($kategori),
                'deskripsi' => 'Deskripsi untuk ' . $kategori,
            ]);

            for ($i = 1; $i <= 3; $i++) {
                $produkNama = $kategori . ' Produk ' . $i;
                $gambarUrl = $this->getPixabayImage($kategori);
                $cloudinaryUrl = $this->uploadToCloudinary($gambarUrl);
                Produk::create([
                    'kategori_produk_id' => $kategoriModel->id,
                    'nama' => $produkNama,
                    'slug' => Str::slug($produkNama),
                    'deskripsi' => 'Deskripsi untuk ' . $produkNama,
                    'harga' => rand(10000, 1000000),
                    'stok' => rand(1, 100),
                    'gambar' => $cloudinaryUrl,
                ]);
            }
        }
    }

    private function getPixabayImage($query)
    {
        $apiKey = env('PIXABAY_API_KEY');
        $response = Http::get('https://pixabay.com/api/', [
            'key' => $apiKey,
            'q' => $query,
            'image_type' => 'photo',
            'per_page' => 3,
        ]);
        $data = $response->json();
        if (!empty($data['hits'])) {
            return $data['hits'][array_rand($data['hits'])]['webformatURL'];
        }
        return null;
    }

    private function uploadToCloudinary($imageUrl)
    {
        if (!$imageUrl)
            return null;
        $cloudinary = app('cloudinary');
        $result = $cloudinary->uploadApi()->upload($imageUrl, [
            'folder' => 'produk',
        ]);
        return $result['secure_url'] ?? null;
    }
}