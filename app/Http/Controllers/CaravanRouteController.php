<?php


namespace App\Http\Controllers;

use App\Models\CaravanRoute;

class CaravanRouteController extends Controller
{
    public function index()
    {
        $routes = CaravanRoute::published()->latest('published_at')->paginate(9);
        return view('routes.index', compact('routes'));
    }

    public function show($slug)
    {
        $route = CaravanRoute::where('slug', $slug)->published()->firstOrFail();
        return view('routes.show', compact('route'));
    }
}
