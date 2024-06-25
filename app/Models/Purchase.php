<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'sellerName',
        'phoneNumber',
        'productName',
        'productCode',
        'quantity',
        'price',
        'date'
    ];

    protected $table = "purchase";
}
