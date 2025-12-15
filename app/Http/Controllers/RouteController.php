<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'description' => 'required|string|min:10',
            'picture' => 'nullable|image|max:2048',
            'difficulty' => 'required|in:makkelijk,gemiddeld,moeilijk',
        ]);

        $path = $request->file('picture')->store('routes', 'public');

        $route->update([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'distance' => $request->input('distance'),
            'duration' => $request->input('duration'),
            'description' => $request->input('description'),
            'picture' => Storage::url($path),
            'difficulty' => $request->input('difficulty'),
        ]);

        return redirect()->route('routes.show', $route)->with('success', 'Route succesvol bijgewerkt!');
    }

    public function create()
    {
        return view('routes.create');
    }

    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'distance' => 'required|integer|min:0.1',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string|min:10',
            'picture' => 'nullable|image|max:2048',
            'difficulty' => 'required|in:makkelijk,gemiddeld,moeilijk',
        ]);

        Route::create([
            'name'=> $request->name,
            'location'=> $request->location,
            'distance'=> $request->distance,
            'duration'=> $request->duration,
            'description'=> $request->description,
            'difficulty'=> $request->difficulty,
        ]);

//        $route = new Route();
//        $route->name = $request->input('name');
//        $route->location = $request->input('location');
//        $route->distance = $request->input('distance');
//        $route->duration = $request->input('duration');
//        $route->description = $request->input('description');
//        $route->difficulty = $request->input('difficulty');
//        $route->picture = $request->input('picture');
////        $route->active = true;
//        $route->save();
        return redirect()->route('routes.index')->with('success', 'Guide created successfully!');
    }

//        $route->save();
//
//        return redirect()
//            ->route('routes.index')
//            ->with('success', 'Route succesvol aangemaakt!');
//    }

//    public function destroy(Route $route) {
//        $route->delete();
//        return redirect()->('home')->with('succes', 'Route verwijdered');
//    }
}
