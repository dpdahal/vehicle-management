<?php

namespace App\Models\Blog;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComments extends Model
{
    use HasFactory;

    protected $guarded = ['web'];
    protected $table = 'blog_comments';


    protected $fillable = ['user_id', 'blogs_id', 'parent_id', 'body'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function replies()
    {
        return $this->hasMany(BlogComments::class, 'parent_id');
    }
}
