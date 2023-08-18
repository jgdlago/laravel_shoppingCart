<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'product_code',
        'description',
        'price',
        'unit_of_measurement'
    ];

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }
}
