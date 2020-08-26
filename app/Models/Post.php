<?php

namespace App\Models;

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

}
