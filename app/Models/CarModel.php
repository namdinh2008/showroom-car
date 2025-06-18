<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_model_id',
        'option_type',
        'name',
        'price_adjustment',
        'image_url',
    ];

    public function configurationOptions()
    {
        return $this->hasMany(CarConfigurationOption::class);
    }

    public function carOrders()
    {
        return $this->hasMany(CarOrder::class);
    }
}
