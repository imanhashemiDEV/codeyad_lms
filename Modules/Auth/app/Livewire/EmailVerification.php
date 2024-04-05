<?php

namespace Modules\Auth\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EmailVerification extends Component
{
    public function resend()
    {
        auth()->user()->sendEmailVerificationNotification();
        session()->flash('message','hhhh');
    }
    #[Layout('auth::layouts.app')]
    public function render()
    {
        return view('auth::livewire.email-verification');
    }
}
