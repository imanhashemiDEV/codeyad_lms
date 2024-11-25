<?php

namespace Modules\CourseListPage\Livewire;

use Illuminate\Contracts\Pagination\Paginator;
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
    public $search;
    public $sort;

    public function updated($search){
        $this->resetPage();
    }

    use WithPagination;
    #[Computed]
    public function courses():Paginator
    {
        return Course::query()
            ->where('status',CourseStatus::Active->value)
            ->where('title','like','%'. $this->search .'%')
            ->when($this->sort==='newest',function ($q){
                $q->orderBy('created_at','DESC');
            })
            ->when($this->sort==='most_viewed',function ($q){
                $q->orderBy('viewed','DESC');
            })
            ->when($this->sort==='most_sold',function ($q){
                $q->orderBy('sold','DESC');
            })
            ->orderBy("updated_at","desc")
            ->paginate(9);

    }

    #[Layout('homepage::layouts.master'),Title('صفحه لیست دوره ها')]
    public function render():View
    {
        return view('courselistpage::livewire.course-list');
    }
}
