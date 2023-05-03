<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table='cart';
    protected $fillable = [
     'cart_name',
     'cart_phone',
     'cart_diachi',
     'cart_trangthai',
     'cart_total',
    ];
}
