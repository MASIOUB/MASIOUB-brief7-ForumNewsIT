<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['image', 'title', 'description', 'category_id', 'created_by'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function upvotes()
    {
        return $this->hasMany(Upvote::class);
    }

    public function downvotes()
    {
        return $this->hasMany(Downvote::class);
    }
}
