<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'is_active',
    ];

    public function variants()
    {
        return $this->hasMany(CarVariant::class);
    }

    public function images()
    {
        return $this->hasMany(CarModelImage::class);
    }
}