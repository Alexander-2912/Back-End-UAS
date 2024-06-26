<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldItem extends Model
{
    use HasFactory;

    protected $table = 'sold_items'; // Menetapkan nama tabel yang terkait dengan model ini dalam basis data

    protected $fillable = [
        'buyer_name',
        'phone_number',
        'product_name',
        'product_code',
        'quantity',
        'price',
        'date',
        'user_id', // ID pengguna yang memiliki catatan
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi bahwa catatan dimiliki oleh satu pengguna
    }
}
