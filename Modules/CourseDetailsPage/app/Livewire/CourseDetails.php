<?php

namespace Modules\CourseDetailsPage\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Renderless;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Comment\Models\CourseComment;
use Modules\Course\Models\Course;

class CourseDetails extends Component
{
    public Course $course;

    #[Validate('required')]
    public $text;
    #[Validate('required')]
    public $stars;

    public function saveComment(): void
    {
        $this->validate();
        CourseComment::query()->create([
            'user_id'=> auth()->user()->id,
            'course_id' => $this->course->id,
            'text' => $this->text,
            'stars'=>$this->stars,
        ]);
    }

    #[Layout('homepage::layouts.master'),Title('صفحه جزئیات دوره')]
    public function render():View
    {
        return view('coursedetailspage::livewire.course-details');
    }
}
