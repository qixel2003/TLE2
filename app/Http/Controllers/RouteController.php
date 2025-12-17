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
            'distance' => 'required|integer|min:0.1',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string|min:10',
            'image' => 'nullable|image|max:4096',
            'difficulty' => 'required|in:makkelijk,gemiddeld,moeilijk',
        ]);

        $data = $request->only([
            'name',
            'location',
            'distance',
            'duration',
            'description',
            'difficulty',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('routes', 'public');
            $data['image'] = Storage::url($path);

            if (!empty($route->picture)) {
                if (str_starts_with($route->picture, '/storage/')) {
                    $old = substr($route->picture, strlen('/storage/'));
                    Storage::disk('public')->delete($old);
                } elseif (preg_match('#/storage/(.+)$#', $route->picture, $m)) {
                    Storage::disk('public')->delete($m[1]);
                }
            }
        }

        $route->update($data);

        return redirect()->route('routes.show', $route)->with('success', 'Route succesvol bijgewerkt!');
    }

    public function create()
    {
        return view('routes.create');
    }

    public function store(Request $request, Route $route)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'distance' => 'required|numeric|min:0.1',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string|min:10',
            'image' => 'nullable|image|max:2048',
            'difficulty' => 'required|in:makkelijk,gemiddeld,moeilijk',
        ]);

        $data = [
            'name' => $request->name,
            'location' => $request->location,
            'distance' => $request->distance,
            'duration' => $request->duration,
            'description' => $request->description,
            'difficulty' => $request->difficulty,
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('routes', 'public');
            $data['image'] = Storage::url($path);
        }

        Route::create($data);

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
