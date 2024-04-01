<?php

namespace Modules\Auth\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    #[Layout('auth::layouts.app')]
    public function render()
    {
        return view('auth::livewire.login');
    }
}
