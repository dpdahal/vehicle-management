<?php

namespace App\Models\Blog;

use App\Models\Admin\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'date',
        'status',
        'meta_title',
        'meta_description',
        'description',
        'image',
        'page_visit',
        'posted_by'
    ];


    public function comments()
    {
        return $this->hasMany(BlogComments::class, 'blogs_id')->whereNull('parent_id');
    }

    public function totalComments()
    {
        return $this->hasMany(BlogComments::class, 'blogs_id', 'id')->count();
    }

    public function limitSummaryGet()
    {
        return Str::limit($this->summary, 50);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'posted_by', 'id');
    }

}
