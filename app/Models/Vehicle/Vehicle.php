<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'capacity',
        'model',
        'color',
        'vehicle_type'
    ];


    public function getVehicleTypes()
    {

        return $this->belongsTo(VehicleType::class, 'vehicle_type', 'id');
    }
}
