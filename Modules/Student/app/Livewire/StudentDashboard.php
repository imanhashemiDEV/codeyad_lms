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
    public $search;
    public $sort;

    #[Layout('homepage::layouts.master'), Title('داشبورد دانشجو')]
    public function render(): View
    {
        $courses = StudentCourse::query()
            ->whereHas('course', function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->sort === 'most_viewed', function ($q2) {
                $q2->leftJoin('courses', 'courses.id', '=', 'student_courses.course_id')
                    ->orderBy('viewed','DESC');
            })
            ->paginate(10);
        return view('student::livewire.student-dashboard', compact('courses'));
    }
}
