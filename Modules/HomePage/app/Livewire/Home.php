<?php

namespace Modules\HomePage\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    #[Layout('homepage::layouts.master'),Title('صفحه اصلی')]
    public function render():View
    {
        return view('homepage::livewire.home');
    }
}
