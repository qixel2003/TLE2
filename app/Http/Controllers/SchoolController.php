<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class SchoolController extends Controller
{
    public function dashboard()
    {

        $classrooms = Classroom::all();

        return view('school.dashboard', compact('classrooms'));
    }
}
