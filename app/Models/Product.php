<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Menetapkan nama tabel yang terkait dengan model ini

    protected $fillable = [
        'product_name', // Nama produk
        'product_code', // Kode produk
        'quantity', // Jumlah produk tersedia
        'price',  // Harga produk
        'date', // Tanggal terkait produk
        'user_id', // ID pengguna
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi bahwa catatan dimiliki oleh satu pengguna
    }
}
