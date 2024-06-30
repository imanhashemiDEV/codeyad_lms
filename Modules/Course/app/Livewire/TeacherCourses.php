<?php

namespace Modules\Course\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Course\app\Enums\CourseStatus;
use Modules\Course\Models\Course;

class TeacherCourses extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Layout('panel::layouts.app'),Title('لیست دوره ها')]
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $courses = Course::query()
            ->where('user_id', auth()->user()->id)
            ->paginate(10);
        return view('course::livewire.teacher-courses', compact('courses'));
    }
}
