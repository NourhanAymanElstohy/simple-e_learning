<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            return view('courses.index', [
                'courses' => $courses,
            ]);
        }
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store()
    {
        Course::create([
            'name' => request()->name,
            'content' => request()->content
        ]);
        return redirect()->route('courses.index');
    }

    public function edit()
    {
        $courseId = request('course');
        $course = Course::find($courseId);
        return view('admin.courses.edit', [
            'course' => $course
        ]);
    }

    public function update()
    {
        $courseId = request()->course;
        $course = Course::find($courseId);

        $data = request()->only([
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
}
