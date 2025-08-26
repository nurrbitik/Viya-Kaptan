<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaravanRoute extends Model
{
    protected $fillable = [
        'title', 'slug', 'distance_km', 'days', 'excerpt', 'content', 'cover', 'is_published', 'published_at',
    ];

    // yayınlanmış scope'u (public tarafta işine yarar)
    public function scopePublished($q)
    {
        return $q->where('is_published', true)->whereNotNull('published_at');
    }
}
