<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_address',
        'company_phone',
        'company_mobile',
        'company_logo',
        'company_icon',
        'company_fax',
        'company_post_box',
        'company_website',
        'meta_keywords',
        'meta_description'
    ];
}
