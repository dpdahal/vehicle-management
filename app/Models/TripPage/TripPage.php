<?php

namespace App\Models\TripPage;

use App\Models\DestinationRate\DestinationRate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'start_from',
        'ends_at',
        'meta_keywords',
        'meta_description',
        'description',
        'thumbnail',
        'image',
        'trip_mode',
        'trip_cost',
        'status'
    ];  

    public function tripGallery()
    {
        return $this->hasMany(TripPageGallery::class, 'trip_page_id', 'id');
    }

    public function tripCost()
    {
        return $this->belongsTo(DestinationRate::class, 'trip_cost', 'id');
    }
}
