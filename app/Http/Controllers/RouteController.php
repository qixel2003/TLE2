<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        // 1. Fetch all routes from the database
        $routes = route::all();

        // 2. Pass the fetched data to a view named 'routes.index'
        return view('route', [
            'routes' => $routes
        ]);
    }
}
