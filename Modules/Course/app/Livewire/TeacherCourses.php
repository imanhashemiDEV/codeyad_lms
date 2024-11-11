<?php

namespace Modules\Course\Livewire;

use Illuminate\Contracts\View\View;
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

    #[Layout('panel::layouts.app'),Title('لیست دوره های مدرس')]
    public function render():View
    {
        $courses = Course::query()
            ->where('user_id', auth()->user()->id)
            ->paginate(10);
        return view('course::livewire.teacher-courses', compact('courses'));
    }
}
