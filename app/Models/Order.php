<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'date', 'parcel', 'address', 'costumerId'
    ];

    public function costumer()
    {
        return $this->belongsTo(Costumer::class, 'costumerId');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'orderId');
    }
}
