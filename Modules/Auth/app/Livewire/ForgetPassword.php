<?php

namespace Modules\Auth\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ForgetPassword extends Component
{
    #[Layout('auth::layouts.app')]
    public function render()
    {
        return view('auth::livewire.forget-password');
    }
}
