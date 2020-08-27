<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\Traits\HasTranslation;
use App\User;

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
}
