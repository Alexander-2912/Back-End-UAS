<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'phone_number',
        'service_name',
        'service_code',
        'price',
        'date',
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
}
