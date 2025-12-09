<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\User;

class ClassroomController extends Controller
{
    public function index(Request $request)
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            //'points' => 'required|integer|min:0',
            'school_id' => 'required|exists:schools,id',
        ]);

        //insert into
        $classroom = new Classroom();
        $classroom->name = $request->input('name');
        //$classroom->points = $request->input('points');
        $classroom->user_id = auth()->id();
        $classroom->school_id = $request->input('school_id');
        $classroom->save();

        return redirect()->route('classrooms.show', compact('classroom'));

    }

    public function create(Classroom $classroom )
    {
        $schools = School::all();

        $users = User::where('role', 2)->get();

        $classroomUsers = $classroom->users()->where('role', 2)->get();

        return view('classrooms.create', compact( 'schools', 'classroomUsers', 'classroom', 'users'));
    }

    public function show($id)
    {
        $users = User::where('role', 2)->get();
        $schools = School::all();
        $classroom = Classroom::with('users')->findOrFail($id);
        $classroomUsers = $classroom->users()->where('role', 2)->get();
        return view('classrooms.show', compact('classroom', 'schools', 'users', 'classroomUsers'));

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
            //'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            //'points' => 'required|integer|min:0',
            'school_id' => 'required|exists:schools,id',
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
        return redirect('school')->with('status', 'Classroom deleted successfully.');

    }

    public function addStudent(Request $request, Classroom $classroom)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $student = User::find($request->user_id);

        $student->classroom_id = $classroom->id;
        $student->save();

        return redirect()->back()->with('success', 'Leerling toegevoegd!');
    }


}
