<?php

namespace Modules\CourseDetailsPage\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Course\Models\Course;

class CourseDetails extends Component
{
    public Course $course;

    #[Layout('homepage::layouts.master'),Title('صفحه جزئیات دوره')]
    public function render():View
    {
        return view('coursedetailspage::livewire.course-details');
    }
}
