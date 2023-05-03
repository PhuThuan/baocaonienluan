<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_detail extends Model
{
    use HasFactory;
    protected $table='cart_detai';
    protected $fillable = [
     'cart_detai_id',
     'cart_detai_name',
     'cart_detai_quantity',
     'cart_detai_price',
    ];
}
