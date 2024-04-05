<?php

namespace Modules\Auth\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ForgetPassword extends Component
{
    public $email;

    public function resetPassword()
    {
        $user = User::query()->where('email',$this->email)->first();

        $result = Password::sendResetLink($this->email);

        if($result===Password::RESET_LINK_SENT){
            session()->flash('message','eeee');
        }else{
            session()->flash('message','eeee');
        }

    }
    #[Layout('auth::layouts.app')]
    public function render()
    {
        return view('auth::livewire.forget-password');
    }
}
