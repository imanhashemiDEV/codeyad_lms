<?php

namespace Modules\Auth\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\Auth\Models\User;

class ForgetPassword extends Component
{

    #[Layout('auth::layouts.app')]
    public function render()
    {
        return view('auth::livewire.forget-password');
    }
}
