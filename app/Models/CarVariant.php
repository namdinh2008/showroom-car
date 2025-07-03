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
        'price',
        'is_active',
    ];

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function colors()
    {
        return $this->hasMany(CarVariantColor::class);
    }

    public function images()
    {
        return $this->hasMany(CarVariantImage::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'reference_id')->where('product_type', 'car_variant');
    }
}
