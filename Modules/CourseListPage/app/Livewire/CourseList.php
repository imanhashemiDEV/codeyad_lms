<?php

namespace Modules\CourseListPage\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Course\app\Enums\CourseStatus;
use Modules\Course\Models\Course;

class CourseList extends Component
{

    use WithPagination;
    #[Computed]
    public function courses()
    {
        return Course::query()
            ->where('status',CourseStatus::Active->value)
            ->orderBy("updated_at","desc")
            ->paginate(1);
    }

    #[Layout('homepage::layouts.master'),Title('صفحه لیست دوره ها')]
    public function render():View
    {
        return view('courselistpage::livewire.course-list');
    }
}
