<?php

namespace Modules\Student\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Student\Models\StudentCourse;

class StudentDashboard extends Component
{

   use WithPagination;
    protected $paginationTheme = 'bootstrap';


    #[Layout('homepage::layouts.master'),Title('داشبورد دانشجو')]
    public function render():View
    {
        $courses = StudentCourse::query()->paginate(10);
        return view('student::livewire.student-dashboard',compact('courses'));
    }
}
