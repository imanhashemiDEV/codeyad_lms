<?php

namespace Modules\Course\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AddCourse extends Component
{
    #[Layout('panel::layouts.app'),Title('اضافه کردن دوره')]
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('course::livewire.add-course');
    }
}
