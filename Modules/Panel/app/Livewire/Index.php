<?php

namespace Modules\Panel\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Layout('panel::layouts.app'),Title('پنل مدیریت')]
    public function render()
    {
        return view('panel::livewire.index');
    }
}
