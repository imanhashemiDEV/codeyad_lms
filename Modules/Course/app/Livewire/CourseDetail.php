<?php

namespace Modules\Course\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Course\Models\Season;

class CourseDetail extends Component
{

    public $course_id;
    #[Rule('required')]
    public $title;

    public function mount($course_id)
    {
        $this->course_id = $course_id;
    }

    public function addSeason()
    {
        $season =Season::query()->where('course_id', $this->course_id)->latest()->first();
        if($season){
            Season::query()->create([
                'user_id'=>auth()->user()->id,
                'course_id'=>$this->course_id,
                'title'=>$this->title,
                'priority'=>$season->priority+1,
            ]);
        }else{
            Season::query()->create([
                'user_id'=>auth()->user()->id,
                'course_id'=>$this->course_id,
                'title'=>$this->title,
                'priority'=>1,
            ]);
        }

        $this->dispatch('closeSeasonModal');


    }
    #[Layout('panel::layouts.app'),Title('جزئیات دوره')]
    public function render()
    {
        $seasons = Season::query()->where('course_id', $this->course_id)
            ->orderBy('priority','ASC')->get();
        return view('course::livewire.course-detail', compact('seasons'));
    }
}
