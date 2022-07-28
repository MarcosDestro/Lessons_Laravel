<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Notifiable;
    public const RELATIONSHIP_POST_CATEGORY = 'post_category';
    
    protected $fillable = ['title', 'subtitle', 'description', 'author', 'slug'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            self::RELATIONSHIP_POST_CATEGORY,
            'post',
            'category'
        );
    }
}
