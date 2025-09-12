<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->paginate(10);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('blog.show', compact('post'));
    }
}
$q = request('q');
$cat = request('cat');

$posts = \App\Models\Post::published()
    ->when($cat, fn($qq)=>$qq->whereHas('category', fn($q2)=>$q2->where('slug', $cat)))
    ->when($q, fn($qq)=>$qq->where(fn($w)=>$w
        ->where('title','like',"%$q%")
        ->orWhere('content','like',"%$q%")))
    ->latest('published_at')->paginate(10);
