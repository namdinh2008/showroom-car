<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
        'product_type',
        'reference_id',
        'is_active',
    ];

    public function carVariant()
    {
        return $this->hasOne(CarVariant::class);
    }

    public function accessory()
    {
        return $this->hasOne(Accessory::class);
    }
}
