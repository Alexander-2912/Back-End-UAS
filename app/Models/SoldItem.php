<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'buyer_name',
        'phone_number',
        'product_name',
        'product_code',
        'quantity',
        'price',
        'date',
    ];
}
