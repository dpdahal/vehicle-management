<?php

namespace App\Models\Vehicle;

use App\Models\DestinationRate\DestinationRate;
use App\Models\TripPage\TripPage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VehicleType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'slug',
        'date',
        'status',
        'meta_keywords',
        'meta_description',
        'image',
        'description',
    ];

    public function getTypeAttribute($value)
    {
        return Str::title($value);
    }

    public function getVehicleTripePage()
    {
        return $this->hasManyThrough(
            TripPage::class,
            DestinationRate::class,
            'vehicle_type',
            'trip_cost'
        );
//        return $this->belongsToMany(
//            DestinationRate::class,
//            TripPage::class,
//            'vehicle_type',
//            'trip_cost'
//        );
    }


}
