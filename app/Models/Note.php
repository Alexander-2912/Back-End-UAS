<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;


    protected $table = 'notes'; // Nama tabel yang digunakan untuk model ini

    protected $fillable = [ // Kolom yang dapat diisi secara massal
        'description', // Deskripsi dari catatan
        'date', // Tanggal catatan dibuat
        'user_id', // ID pengguna yang memiliki catatan
        'important' // Status penting atau tidaknya catatan
    ];

    protected $dates = [
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi bahwa catatan dimiliki oleh satu pengguna
    }
}
