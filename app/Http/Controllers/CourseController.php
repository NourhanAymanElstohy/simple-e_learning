<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        if (auth()->user()->hasRole('admin')) {
            return view('admin.courses.index', [
                'courses' => $courses,
            ]);
        } else {
            $studentId = Auth::id();
            $student = User::find($studentId);
            $students_courses = $student->courses->toArray();
            $st_courses = [];

            foreach ($students_courses as $st_co) {
                foreach ($st_co as $key => $value) {
                    if ($key == 'id') {
                        array_push($st_courses, $value);
                    }
                }
            }
            return view('courses.index', [
                'courses' => $courses,
                'st_courses' => $st_courses
            ]);
        }
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(StoreCourseRequest $request)
    {
        Course::create([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return redirect()->route('courses.index');
    }

    public function show()
    {
        $courseId = request()->course;
        $course = Course::find($courseId);

        if (auth()->user()->hasRole('admin')) {
            return view('admin.courses.show', [
                'course' => $course,
            ]);
        } elseif (auth()->user()->hasRole('student')) {
            return view('courses.show', [
                'course' => $course,
            ]);
        }
    }

    public function edit()
    {
        $courseId = request('course');
        $course = Course::find($courseId);
        return view('admin.courses.edit', [
            'course' => $course
        ]);
    }

    public function update(UpdateCourseRequest $request)
    {
        $courseId = $request->course;
        $course = Course::find($courseId);

        $data = $request->only([
            'name',
            'content'
        ]);

        $course->update($data);
        return redirect()->route('courses.index');
    }

    public function destroy()
    {
        $courseId = request()->course;
        $course = Course::find($courseId);
        $course->delete();
        return redirect()->route('courses.index');
    }

    public function attach()
    {
        $courseId = request()->course;
        $course = Course::findOrFail($courseId);
        $studentId = Auth::id();
        $student = User::find($studentId);

        $student->courses()->attach($course);
        return redirect()->route('courses.index');
    }

    public function detach()
    {
        $courseId  = request()->course;
        $course = Course::findOrFail($courseId);
        $studentId = Auth::id();
        $student = User::find($studentId);
        $student->courses()->detach($course);
        return redirect()->route('courses.index');
    }
}
