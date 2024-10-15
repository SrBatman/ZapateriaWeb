<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = [
        'orderId', 'productId', 'price', 'quantity', 'discount', 'total'
    ];

   
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

 
    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId');
    }
}
