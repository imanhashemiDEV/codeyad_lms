<?php

namespace Modules\Student\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\User\app\Models\User;

class StudentProfile extends Component
{

    public $name;
    #[Locked]
    public $email;

    public function updateProfile(): void
    {
        $user =  User::query()->find(auth()->user()->id);
        $user->update([
            "name"=> $this->name,
        ]);
     }

    #[Layout('homepage::layouts.master'), Title('پروفایل دانشجو')]
    public function render():View
    {
        $user =  User::query()->find(auth()->user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        return view('student::livewire.student-profile', compact('user'));
    }
}
