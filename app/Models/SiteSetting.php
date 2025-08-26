<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name', 'hero_title', 'hero_subtitle', 'hero_buttons',
        'stats_posts', 'stats_routes', 'stats_followers',
        'email', 'address', 'socials',
    ];

    protected $casts = [
        'hero_buttons' => 'array',
        'socials' => 'array',
    ];
}
