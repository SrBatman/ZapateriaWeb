<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;

    protected $table = 'costumers';

    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'picture', 'status', 'verified', 'address'
    ];

  
    public function orders()
    {
        return $this->hasMany(Order::class, 'costumerId');
    }


    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'costumerId');
    }
}
