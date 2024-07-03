<?php

namespace Modules\Course\Livewire;

use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Course\app\Enums\CourseStatus;
use Modules\Course\Models\Course;

class AddCourse extends Component
{

    #[Rule('required')]
    public $category_id;
    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $price;
    #[Rule('required')]
    public $description;
    #[Rule('required')]
    public $level;
    #[Rule('required|mimetypes::video/mp4, video/mpeg')]
    public $video;
    #[Rule('required|mimes:jpg,png')]
    public $image;


    public function createTeacherCourse()
    {
        Course::query()->create([
            'user_id'=>auth()->user()->id,
            'category_id'=>$this->category_id,
            'title'=>$this->title,
            'slug'=>Str::slug($this->title),
            'price'=>$this->price,
            'description'=>$this->description,
            'level'=>$this->level,
            'status'=>CourseStatus::Draft->value,
            'video'=>$this->video,
            'image'=>$this->image
        ]);
    }

    #[Layout('panel::layouts.app'),Title('اضافه کردن دوره')]
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('course::livewire.add-course');
    }
}
