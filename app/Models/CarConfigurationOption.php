<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarConfigurationOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_model_id',
        'option_type',
        'name',
        'additional_price',
        'is_active',
    ];

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }
}