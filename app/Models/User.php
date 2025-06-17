<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'role'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function carOrders() {
        return $this->hasMany(CarOrder::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}