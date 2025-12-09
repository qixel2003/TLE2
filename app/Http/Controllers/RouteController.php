<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        // Haal alle routes op uit de database
        $routes = Route::latest()->get();

        // Stuur de data naar de home view
        return view('routes.index', compact('routes'));
    }

    public function show(Route $route)
    {
        return view('routes.show', compact('route'));
    }

    public function edit(Route $route)
    {
        return view('routes.edit', compact('route'));
        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om routes te bewerken.');
        // }
    }

    public function update(Request $request, Route $route)
    {
        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om routes te bewerken.');
        // }

        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'distance' => 'required|integer',
            'duration' => 'required|integer',
            'description' => 'required|string',
            'difficulty' => 'required|in:makkelijk,gemiddeld,moeilijk',
        ]);

        $route->update([
           'name' => $request->input('name'),
            'location' => $request->input('location'),
            'distance' => $request->input('distance'),
            'duration' => $request->input('duration'),
            'description' => $request->input('description'),
            'difficulty' => $request->input('difficulty'),
        ]);

        return redirect()->route('routes.show', $route)->with('success', 'Route succesvol bijgewerkt!');
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
//        $route->active = true;
        $route->save();

        return redirect()->route('routes.index')->with('success', 'Route succesvol aangemaakt.');
    }

//    public function destroy(Route $route) {
//        $route->delete();
//        return redirect()->('home')->with('succes', 'Route verwijdered');
//    }
}
