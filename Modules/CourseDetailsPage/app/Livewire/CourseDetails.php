<?php

namespace Modules\CourseDetailsPage\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CourseDetails extends Component
{
    #[Layout('homepage::layouts.master'),Title('صفحه جزئیات دوره')]
    public function render():View
    {
        return view('coursedetailspage::livewire.course-details');
    }
}
