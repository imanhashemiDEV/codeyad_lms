<?php

namespace Modules\Course\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Course\app\Enums\CourseCommentStatus;
use Modules\Course\Models\Course;
use Modules\User\app\Models\User;

class Courses extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function changeCourseStatus($course_id)
    {
        $course = Course::query()->findOrFail($course_id);
        if($course->status == CourseCommentStatus::Draft->value){
            $course->update([
                'status' => CourseCommentStatus::Active->value
            ]);
        }else if($course->status == CourseCommentStatus::Active->value){
            $course->update([
                'status' => CourseCommentStatus::Rejected->value
            ]);
        }else if($course->status == CourseCommentStatus::Rejected->value){
            $course->update([
                'status' => CourseCommentStatus::Archived->value
            ]);
        }else if($course->status == CourseCommentStatus::Archived->value){
            $course->update([
                'status' => CourseCommentStatus::Draft->value
            ]);
        }
    }
    #[Layout('panel::layouts.app'),Title('لیست دوره ها')]
    public function render():View
    {
        $courses = Course::query()->paginate(10);
        return view('course::livewire.courses', compact('courses'));
    }
}
