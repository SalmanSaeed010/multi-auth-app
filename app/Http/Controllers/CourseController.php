<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth:admin,teacher')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        Course::create($request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]));

        return redirect('/courses')->with('success', 'Course created successfully!');
    }

    public function show(Course $course)
    {   
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]));

        return redirect('/courses')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect('/courses')->with('success', 'Course deleted successfully!');
    }
}
