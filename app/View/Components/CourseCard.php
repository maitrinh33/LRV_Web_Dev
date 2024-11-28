<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CourseCard extends Component
{
    public $course;  // Declare the variable that will hold course data

    /**
     * Create a new component instance.
     * 
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function __construct($course)
    {
        $this->course = $course; // Assign passed course data to the class variable
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.course-card');
    }
}
