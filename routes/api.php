<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\PublicCaravanRouteController;

Route::get('/posts', function (Request $request) {
    return Post::with('category')
        ->where('is_published', true)
        ->whereNotNull('published_at')
        ->orderByDesc('published_at')
        ->take(12)
        ->get(['id','title','slug','cover','content','published_at','category_id']);
});

Route::get('/posts/{slug}', function (string $slug) {
    return Post::with('category')
        ->where('slug', $slug)
        ->where('is_published', true)
        ->whereNotNull('published_at')
        ->firstOrFail(['id','title','slug','cover','content','published_at','category_id']);

});

Route::get('/caravan-routes', [PublicCaravanRouteController::class, 'index']);
Route::get('/caravan-routes/{slug}', [PublicCaravanRouteController::class, 'show']);
