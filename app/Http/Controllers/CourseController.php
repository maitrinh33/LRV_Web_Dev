<?php

namespace App\Http\Controllers;

use App\Models\Course; // Make sure to import the Course model
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        // Fetch courses from the database
        $courses = Course::query();

        // Apply filters if search or category is present
        if ($request->has('search')) {
            $courses->where('name', 'like', '%' . $request->search . '%');
        }

        // Get the filtered courses
        $courses = $courses->get();

        // Return the view and pass the courses variable
        return view('course', compact('courses'));
    }
}
