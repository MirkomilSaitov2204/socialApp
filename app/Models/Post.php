<?php

namespace App\Models;

use App\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use App\Support\Traits\HasTranslation;

class Post extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'detail',
        'description',
        'image',
        'iso_code',
        'is_active',
        'user_id',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_active' => 0,
    ];

    protected $translatable = [
        'title', 'detail'
    ];



    /**
     * Get all posts
     *
     * @return mix
     */
    public function getAllPosts()
    {
        return $this->all();
    }

    public function getAllPostsUser()
    {
        return $this->with('user')->get();
    }


    /**
     * Get all posts
     *
     * @return mix
     */
    public function getAllPostsWithStatus()
    {
        return $this->where('is_active', 'yes')->get();
    }



    /**
     * User relationships
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
