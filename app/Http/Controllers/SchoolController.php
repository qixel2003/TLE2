<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Classroom;

class SchoolController extends Controller
{
    public function dashboard()
    {
        $schools = School::all();
        $classrooms = Classroom::all();

        return view('school.dashboard', compact('classrooms', 'schools'));
    }

    public function index(Request $request)
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        //insert into
        $school = new School();
        $school->name = $request->input('name');
        //$school->city = $request->input('city');
        //$school->points = $request->input('points');
        $school->user_id = auth()->id();
        //$school->student_id = $request->input('student_id');
        //school->classroom_id = $request->input('classroom_id');
        $school->save();

        return redirect()->route('school.show', $school->id);

    }

    public function create()
    {
        $school = School::all();

        return view('school.create', compact('school'));
    }

    public function show($id)
    {
        $classrooms = Classroom::all();
        $school = School::with('user')->findOrFail($id);
        return view('school.show', compact('school', 'classrooms'));
    }

    public function edit()
    {
        if (!auth()->check() || (int)auth()->user()->role !== 1) {
            abort(403, 'Unauthorized action.');
        }

        //return view('classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $school->update($request->all());

        $school->save();
        return redirect()->route('school.show', $school->id);
    }

    public function destroy(School $school)
    {
        if (!auth()->check() || (int)auth()->user()->role !== 1) {
            abort(403, 'Unauthorized action.');
        }

        $school->delete();
        return redirect('school.dashboard')->with('status', 'School deleted successfully.');

    }
}
