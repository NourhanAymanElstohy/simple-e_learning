<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::all()->where('role', 1);
        return view('admin.students.index', [
            'students' => $students,
        ]);
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store()
    {
        $student = User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
            'role' => 1
        ]);
        $student->assignRole('student');
        $student->save();
        return redirect()->route('students.index');
    }

    public function edit()
    {
        $studentId = request('student');
        $student = User::find($studentId);
        return view('admin.students.edit', [
            'student' => $student
        ]);
    }

    public function update()
    {
        $studentId = request()->student;
        $student = User::find($studentId);

        $data = request()->only([
            'name',
            'email',
        ]);
        $password = Hash::make(request()->password);
        $data += array('password' => $password);

        $student->update($data);
        return redirect()->route('students.index');
    }

    public function destroy()
    {
        $studentId = request()->student;
        $student = User::find($studentId);
        $student->delete();
        return redirect()->route('students.index');
    }
}
