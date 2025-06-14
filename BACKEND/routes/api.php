<?php

use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\KategoriProdukController;
use App\Http\Controllers\Api\PengaturanTampilanController;
use Illuminate\Support\Facades\Route;

Route::get('produks', [ProdukController::class, 'index']);
Route::get('kategoris', [KategoriProdukController::class, 'index']);
Route::get('banners', [PengaturanTampilanController::class, 'index']);