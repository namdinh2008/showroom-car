<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'car_model_id',
        'name',
        'description',
        'features',
        'is_active',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function images()
    {
        return $this->hasMany(CarVariantImage::class);
    }

    public function colors()
    {
        return $this->hasMany(CarVariantColor::class);
    }
}