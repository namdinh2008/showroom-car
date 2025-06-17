<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'base_price', 'description', 'image_url', 'is_active'
    ];

    public function configurationOptions() {
        return $this->hasMany(CarConfigurationOption::class);
    }

    public function carOrders() {
        return $this->hasMany(CarOrder::class);
    }
}
