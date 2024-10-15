<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    protected $fillable = [
        'costumerId', 'productId'
    ];

    public function costumer()
    {
        return $this->belongsTo(Costumer::class, 'costumerId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
