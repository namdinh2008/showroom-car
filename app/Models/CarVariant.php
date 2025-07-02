<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarVariant extends Model
{
    use HasFactory;

    protected $fillable = [
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
    public function product()
    {
        return $this->hasOne(Product::class, 'reference_id')->where('product_type', 'car_variant');
    }
}