<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        // 1. Fetch all routes from the database
        $routes = Route::latest()->get();

        // 2. Pass the fetched data to a view named 'routes.index'
        return view('home', [
            'routes' => $routes
        ]);
    }
    public function show($id) {
        $route = Route::find($id);
        if (!$route) {
            return redirect()->route('routes.index')->with('error', 'Route niet gevonden.');
        }

        return view('route', compact('route'));
    }

    public function create() {
        return view('routes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'distance' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'difficulty' => 'required|in:makkelijk,gemiddeld,moeilijk',
        ]);

        $route = new Route();
        $route->name = $request->input('name');
        $route->location = $request->input('location');
        $route->distance = $request->input('distance');
        $route->duration = $request->input('duration');
        $route->description = $request->input('description');
        $route->difficulty = $request->input('difficulty');
        $route->picture = null;
        $route->active = true;
        $route->save();

        return redirect()->route('routes.index')->with('success', 'Route succesvol aangemaakt!');
    }
}
