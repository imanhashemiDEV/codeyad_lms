<?php

namespace Modules\Course\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CourseDetail extends Component
{

    #[Layout('panel::layouts.app'),Title('جزئیات دوره')]
    public function render()
    {
        return view('course::livewire.course-detail');
    }
}
