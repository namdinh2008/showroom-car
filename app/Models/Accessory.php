<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'stock', 'category', 'image_url'
    ];

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }
}