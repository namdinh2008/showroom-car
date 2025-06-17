<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarOrderOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_order_id', 'configuration_option_id'
    ];

    public function carOrder() {
        return $this->belongsTo(CarOrder::class);
    }

    public function configurationOption() {
        return $this->belongsTo(CarConfigurationOption::class);
    }
}
