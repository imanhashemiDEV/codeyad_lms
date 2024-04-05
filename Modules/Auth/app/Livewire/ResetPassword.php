<?php

namespace Modules\Auth\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ResetPassword extends Component
{
    public $token;
    public $password;
    public $password_confirmation;

    public function mount($token)
    {
        $this->token=$token;
    }

    public function resetPassword()
    {
        $result = Password::reset($this->token,$this->password);

        if($result===Password::PASSWORD_RESET){
            return to_route('login');
        }else{
            session()->flash('message','eeee');
        }
    }
    public function render()
    {
        return view('auth::livewire.reset-password');
    }
}
