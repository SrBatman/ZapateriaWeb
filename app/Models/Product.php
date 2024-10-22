<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'stock', 'price', 'discount', 'image', 'image2', 'image3', 'status', 'providerId'
    ];


    public function provider()
    {
        return $this->belongsTo(Provider::class, 'providerId');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'productId');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'productId');
    }
}
