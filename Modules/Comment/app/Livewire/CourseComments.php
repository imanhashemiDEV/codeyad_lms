<?php

namespace Modules\Comment\Livewire;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Comment\app\Enums\CourseCommentStatus;
use Modules\Comment\Models\CourseComment;

class CourseComments extends Component
{
    use WithPagination;
    public function changeCourseCommentStatus($commrnt_id): void
    {
        $comment = CourseComment::query()->findOrFail($commrnt_id);
        if($comment->status === CourseCommentStatus::Draft->value){
            $comment->update([
                'status'=> CourseCommentStatus::Accepted->value
            ]);
        }else if($comment->status === CourseCommentStatus::Accepted->value){
            $comment->update([
                'status'=> CourseCommentStatus::Rejected->value
            ]);
        }else if($comment->status === CourseCommentStatus::Rejected->value) {
            $comment->update([
                'status' => CourseCommentStatus::Draft->value
            ]);
        }
    }

    #[Computed]
    public function comments():Paginator
    {
        return CourseComment::query()
            ->orderBy('created_at','DESC')
            ->paginate(10);
    }
    #[Layout('panel::layouts.app'),Title('لیست نظرات دوره ها')]
    public function render():View
    {
        return view('comment::livewire.course-comments');
    }
}
