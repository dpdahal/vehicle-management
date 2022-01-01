<?php

namespace App\Models\Driver;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'gender',
        'phone',
        'mobile',
        'image',
        'citizen_number',
    ];
}
