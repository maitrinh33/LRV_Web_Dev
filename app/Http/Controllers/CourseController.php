<?php

namespace App\Http\Controllers;

use App\Models\Course; 
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        // Fetch courses from the database
        $courses = Course::query();

        // Get the filtered courses
        $courses = $courses->get();

        // Return the view and pass the courses variable
        return view('course', compact('courses'));
    }
}
