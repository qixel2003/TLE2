<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School;
use App\Models\Active_Route;

class StudentController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('student.dashboard', compact('schools'));
    }

    public function show(Student $student)
    {

        $student->load('activeRoutes.route');
        $totalKm = $student->activeRoutes->sum(fn($ar) => $ar->route->distance ?? 0);
        $totalMinutes = $student->activeRoutes->sum(fn($ar) => $ar->route->duration ?? 0);
        $totalRoutes = $student->activeRoutes->count();

        return view('students.show', compact('student', 'totalKm', 'totalMinutes', 'totalRoutes'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'school_id' => 'required|exists:schools,id',
        ]);


    //insert into
    $student = new Student();
    $student->user_id = $request->input('user_id');
    $student->school_id = $request->input('school_id');
    $student->save();
    return redirect()->route('student.index', $student->id);
    }

    public function destroy(Student $student)
    {
        if (!auth()->check() || (int)auth()->user()->role !== 1) {
            abort(403, 'Unauthorized action.');
        }

        $student->delete();
        return redirect()->back()->with('success', 'Leerling verwijderd.');
    }
}
