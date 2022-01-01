<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Auth;

class Admin extends Auth
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'slug',
        'email',
        'password',
        'gender',
        'date_of_birth',
        'image',
        'phone',
        'status',
        'admin_type'
    ];
}
