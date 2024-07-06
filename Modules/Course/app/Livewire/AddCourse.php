<?php

namespace Modules\Course\Livewire;

use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Category\Models\Category;
use Modules\Course\app\Enums\CourseStatus;
use Modules\Course\Models\Course;

class AddCourse extends Component
{
   use WithFileUploads;
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
    #[Rule('required')]
    public $video;
    #[Rule('required|mimes:jpg,png')]
    public $image;


    public function createTeacherCourse(): void
    {
         $image_name = $this->image->hashName();
         $video_name = $this->video->hashName();


        $course = Course::query()->create([
            'user_id'=>auth()->user()->id,
            'category_id'=>$this->category_id['value'],
            'title'=>$this->title,
            'slug'=>Str::slug($this->title),
            'price'=>$this->price,
            'description'=>$this->description,
            'level'=>$this->level['value'],
            'status'=>CourseStatus::Draft->value,
            'video'=>$video_name,
            'image'=>$image_name
        ]);

        $this->image->store("images/courses/$course->title",'public');
        $this->video->store("videos/courses/$course->title",'public');

    }

    #[Layout('panel::layouts.app'),Title('اضافه کردن دوره')]
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::query()->where('parent_id','!=',0)->pluck('title','id');
        return view('course::livewire.add-course', compact('categories'));
    }
}
