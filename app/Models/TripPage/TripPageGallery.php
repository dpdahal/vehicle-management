<?php

namespace App\Models\TripPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripPageGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_name',
        'trip_page_id'
    ];
}
