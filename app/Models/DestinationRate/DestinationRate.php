<?php

namespace App\Models\DestinationRate;

use App\Models\City\City;
use App\Models\Vehicle\VehicleType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DestinationRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to',
        'cost',
        'vehicle_type'
    ];

    public function fromName()
    {
        return $this->belongsTo(City::class, 'from', 'id');
    }

    public function toName()
    {
        return $this->belongsTo(City::class, 'to', 'id');
    }

    public function getVehicleType()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type', 'id');
    }

    public function getDestinationPrice()
    {
        return Str::title($this->fromName->city_name.'-'.$this->toName->city_name."-by-".$this->getVehicleType->type.':'.$this->cost);
    }
}
