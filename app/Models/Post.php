<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $casts = [
    'published_at' => 'datetime',
    'is_published' => 'boolean',
    'gallery'      => 'array',
    'sections'     => 'array',
];
    protected $fillable = [
        'category_id','title','slug','content','cover','is_published','published_at',
    ];
    public function scopePublished($q)
    {
        return $q->where('is_published', true)->whereNotNull('published_at');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

