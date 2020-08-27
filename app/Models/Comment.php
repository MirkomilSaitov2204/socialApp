<?php

namespace App\Models;

use App\User;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';

    protected $fillable = ['post_id', 'approved', 'name', 'comment', 'email', 'user_id'] ;

    public function UserComment()
    {
        return $this->with('user')->get();
    }
    /**
     * Relationships
     *
     */

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies(){
    	return $this->hasMany(Reply::class);
    }
}
