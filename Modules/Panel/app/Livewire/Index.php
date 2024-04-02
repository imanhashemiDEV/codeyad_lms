<?php

namespace Modules\Panel\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('panel::layouts.app')]
    public function render()
    {
        return view('panel::livewire.index');
    }
}
