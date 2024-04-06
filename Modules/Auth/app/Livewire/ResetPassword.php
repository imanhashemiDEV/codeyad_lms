<?php

namespace Modules\Auth\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ResetPassword extends Component
{
    public function render()
    {
        return view('auth::livewire.reset-password');
    }
}
