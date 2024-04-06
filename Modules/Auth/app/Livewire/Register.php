<?php

namespace Modules\Auth\Livewire;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Modules\Auth\Models\User;

class Register extends Component
{
    #[Rule('required')]
    public $name;
    #[Rule('required|unique:users,email')]
    public $email;
    #[Rule('required|min:6|confirmed')]
    public $password;
    public $password_confirmation;

    public function registerUser()
    {
        $this->validate();

        $user = User::query()->create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),
        ]);

        Auth::login($user);

    }
    #[Layout('auth::layouts.app')]
    public function render()
    {
        return view('auth::livewire.register');
    }
}
