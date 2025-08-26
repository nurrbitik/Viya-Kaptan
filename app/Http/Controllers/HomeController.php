<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\CaravanRoute;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function __invoke()
    {
        $settings = SiteSetting::first();
        $latestPosts = Post::published()->latest('published_at')->take(3)->get();
        $routes = CaravanRoute::published()->latest('published_at')->take(3)->get();

        return view('home', compact('settings', 'latestPosts', 'routes'));
    }
}
