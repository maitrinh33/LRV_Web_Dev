<?php
namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Course;

class CourseCard extends Component
{
    public Course $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function render(): View
    {
        return view('components.course-card');
    }
}
