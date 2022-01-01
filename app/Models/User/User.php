<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Auth;

class User extends Auth
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'username',
        'email',
        'password',
        'gender',
        'phone',
        'mobile',
        'image',
        'status',
        'provider',
        'provider_id'
    ];


    public function verifyBuyer()
    {
        return $this->hasOne(UserVerify::class);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
