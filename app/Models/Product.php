<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = [
        'products_noibat',
        'products_theloai',
        'products_name',
        'products_description',
        'products_image',
        'products_image2',
        'products_price',
        'products_discount',
        'products_soluong',
    ];
}
