<?php

namespace Modules\Auth\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Register extends Component
{
    #[Rule('required|unique:users,email')]
    public $email;
    #[Rule('required|min:6|confirmed')]
    public $password;
    public $password_confirmation;

    public function registerUser()
    {
        $this->validate();
    }
    #[Layout('auth::layouts.app')]
    public function render()
    {
        return view('auth::livewire.register');
    }
}
