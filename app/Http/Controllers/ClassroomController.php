<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index(Request $request)
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'points' => 'required|integer|min:0',
        ]);

        //insert into
        $classroom = new Classroom();
        $classroom->name = $request->input('name');
        $classroom->points = $request->input('points');
        $classroom->user_id = auth()->id();
        $classroom->save();

        return redirect()->route('classrooms.show', $classroom->id);

    }

    public function create()
    {
        $classroom = Classroom::all();

        return view('classrooms.create', compact('classroom'));
    }

    public function show($id)
    {
        $classroom = Classroom::with(['user', 'users'])->findOrFail($id);
        return view('classrooms.show', compact('classroom'));
    }

    public function edit()
    {
        if (!auth()->check() || (int)auth()->user()->role !== 1) {
            abort(403, 'Unauthorized action.');
        }

        //return view('classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'points' => 'required|integer|min:0',
        ]);
        $classroom->update($request->all());

        $classroom->save();
        return redirect()->route('classrooms.show', $classroom->id);
    }

    public function destroy(Classroom $classroom)
    {
        if (!auth()->check() || (int)auth()->user()->role !== 1) {
            abort(403, 'Unauthorized action.');
        }

        $classroom->delete();
        return redirect('school.dashboard')->with('status', 'Classroom deleted successfully.');

    }

}
