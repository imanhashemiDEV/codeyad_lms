<?php

namespace Modules\CourseDetailsPage\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Renderless;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Comment\app\Enums\CommentVoteType;
use Modules\Comment\Models\CourseComment;
use Modules\Comment\Models\UserCommentVote;
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
        session()->flash('message','نظر شما ثبت شد و بعد از تایید ادمین نمایش داده می شود');
    }

    public function likeComment($comment_id): void
    {
        $comment = CourseComment::query()->find($comment_id);
        $check = UserCommentVote::query()
            ->where('user_id',auth()->user()->id)
            ->where('course_comment_id',$comment_id)->first();
        if ($check) {
              if($check->type===CommentVoteType::Dislike->value){
                  $check->update([
                      'type'=>CommentVoteType::Like->value
                  ]);
                  $comment->decrement('dislike');
                  $comment->increment('like');
              }
        }else{
            UserCommentVote::query()->create([
                'user_id'=>auth()->user()->id,
                'course_comment_id'=>$comment_id,
                'type'=> CommentVoteType::Like->value
            ]);
            $comment->increment('like');
        }
    }

    // refactor for dislike by student
    public function dislikeComment($comment_id): void
    {
        $comment = CourseComment::query()->find($comment_id);
        $check = UserCommentVote::query()
            ->where('user_id',auth()->user()->id)
            ->where('course_comment_id',$comment_id)->first();
        if ($check) {
            if($check->type===CommentVoteType::Dislike->value){
                $check->update([
                    'type'=>CommentVoteType::Like->value
                ]);
                $comment->decrement('dislike');
                $comment->increment('like');
            }
        }else{
            UserCommentVote::query()->create([
                'user_id'=>auth()->user()->id,
                'course_comment_id'=>$comment_id,
                'type'=> CommentVoteType::Like->value
            ]);
            $comment->increment('like');
        }
    }

    #[Computed]
    public function comments(): Collection|array
    {
        return CourseComment::query()->where('course_id', $this->course->id)->get();
    }

    #[Layout('homepage::layouts.master'),Title('صفحه جزئیات دوره')]
    public function render():View
    {
        return view('coursedetailspage::livewire.course-details');
    }
}
