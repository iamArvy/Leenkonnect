<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\Blog\PostFactory> */
    use HasFactory;
    protected $table = 'blog_posts';
    protected $fillable = [
        'title',
        'image',
        'content',
        'category_id'
    ];
    protected $appends = ['date'];
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public function getDateAttribute()
    {
        return $this->created_at ? $this->created_at->format('F j, Y') : null;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
