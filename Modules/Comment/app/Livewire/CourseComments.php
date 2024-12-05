<?php

namespace Modules\Comment\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CourseComments extends Component
{
    #[Layout('panel::layouts.app'),Title('لیست نظرات دوره ها')]
    public function render()
    {
        return view('comment::livewire.course-comments');
    }
}
