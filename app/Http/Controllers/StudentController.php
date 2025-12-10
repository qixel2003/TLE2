<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School;

class StudentController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('student.dashboard', compact('schools'));
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

}
