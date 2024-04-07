<?php

namespace Modules\Auth\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ResetPassword extends Component
{
#[Layout('auth::layouts.app'),Title('فراموشی رمز عبور')]
    public function render()
    {
        return view('auth::livewire.reset-password');
    }
}
