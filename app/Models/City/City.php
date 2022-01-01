<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
        'city_slug',
        'image',
        'video',
        'status',
        'meta_title',
        'meta_description',
        'description',
        'is_footer'
    ];

}
