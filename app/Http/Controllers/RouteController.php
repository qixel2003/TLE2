<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function show(Route $route)
    {
        return view('routes.show', compact('route'));
    }
    public function index()
    {
        // Haal alle routes op uit de database
        $routes = Route::all();

        return view('routes.index', compact('routes'));
    }

    public function edit(Route $route)
    {
        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om routes te bewerken.');
        // }

        return view('routes.edit', compact('route'));
    }

    public function update(Request $request, Route $route)
    {
        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om routes te bewerken.');
        // }

        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'distance' => 'required|numeric|min:0.1',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string|min:255',
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
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'distance' => 'required|numeric|min:0.1',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string|min:10',
            'difficulty' => 'required|in:makkelijk,gemiddeld,moeilijk',
        ]);

        Route::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'distance' => $request->input('distance'),
            'duration' => $request->input('duration'),
            'description' => $request->input('description'),
            'difficulty' => $request->input('difficulty'),
            'picture' => null,
            // 'active' => true,
        ]);

        return redirect()
            ->route('routes.index')
            ->with('success', 'Route succesvol aangemaakt!');
    }

//    public function destroy(Route $route) {
//        $route->delete();
//        return redirect()->('home')->with('succes', 'Route verwijdered');
//    }
}
