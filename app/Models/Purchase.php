<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchase'; // Menetapkan nama tabel yang terkait dengan model ini dalam basis data

    protected $fillable = [
        'sellerName', // Nama penjual
        'phoneNumber', // Nomor telepon penjual
        'productName', // Nama produk yang dibeli
        'productCode', // Kode produk yang dibeli
        'quantity', // Jumlah produk yang dibeli
        'price',  // Harga produk per unit
        'date', // Tanggal pembelian
        'user_id', // ID pengguna
    ];


    public function user()
    {
        return $this->belongsTo(User::class); // Relasi bahwa catatan dimiliki oleh satu pengguna
    }
}
