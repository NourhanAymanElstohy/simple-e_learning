<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

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

    public function store(StoreStudentRequest $request)
    {
        $student = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(Str::random(8)),
            'role' => 1
        ]);
        $student->assignRole('student');
        $student->save();

        $token = app('auth.password.broker')->createToken($student);
        $student->sendPasswordResetNotification($token);

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

    public function update(UpdateStudentRequest $request)
    {
        $studentId = $request->student;
        $student = User::find($studentId);

        if (auth()->user()->hasRole('admin')) {
            $data = $request->only([
                'name',
                'email',
            ]);
            $student->update($data);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save(public_path('/upload/profile_pic/' . $filename));

                $student->image = $filename;
                $student->save();
            }
            return redirect()->route('students.index');
        } elseif (auth()->user()->hasRole('student')) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save(public_path('/upload/profile_pic/' . $filename));

                $student->image = $filename;
                $student->save();
                return redirect()->route('students.show', [
                    'student' => $student
                ]);
            }
        }
    }

    public function show()
    {
        $studentId = request()->student;
        $student = User::find($studentId);

        if (auth()->user()->hasRole('admin')) {
            return view('admin.students.show', [
                'student' => $student,
            ]);
        } elseif (auth()->user()->hasRole('student')) {
            return view('students.show', [
                'student' => $student,
            ]);
        }
    }

    public function destroy()
    {
        $studentId = request()->student;
        $student = User::find($studentId);
        $student->delete();
        return redirect()->route('students.index');
    }

    public function update_image()
    {
        $studentId = request()->student;
        $student = User::find($studentId);

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('/upload/profile_pic/' . $filename));

            $student->image = $filename;
            $student->save();
        }
    }
}
