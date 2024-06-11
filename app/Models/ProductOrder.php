<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_size',
        'product_color',
        'product_quantity',
        'product_price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
