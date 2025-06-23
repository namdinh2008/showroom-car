<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarVariantColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_variant_id',
        'color_name',
        'image_url',
    ];

    public function variant()
    {
        return $this->belongsTo(CarVariant::class, 'car_variant_id');
    }
}
