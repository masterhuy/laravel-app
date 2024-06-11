<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'tax',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'note',
        'payment'
    ];

    public function productOrders()
    {
        return $this->hasMany(ProductOrder::class);
    }
}
