<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services'; // Menetapkan nama tabel yang terkait dengan model ini dalam basis data

    protected $fillable = [
        'customer_name',
        'phone_number',
        'service_name',
        'service_code',
        'price',
        'date',
        'user_id', // ID pengguna yang memiliki catatan
    ];

    // Jika diperlukan, atur validasi untuk input
    public static $rules = [
        'customer_name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'service_name' => 'required|string|max:255',
        'service_code' => 'required|string|max:50',
        'price' => 'required|numeric',
        'date' => 'required|date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi bahwa catatan dimiliki oleh satu pengguna
    }
}
