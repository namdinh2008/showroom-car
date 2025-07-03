<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'name', 'description', 'image_url', 'is_active'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function variants()
    {
        return $this->hasMany(CarVariant::class);
    }

    public function images()
    {
        return $this->hasMany(CarModelImage::class);
    }
}