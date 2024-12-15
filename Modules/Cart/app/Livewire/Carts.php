<?php

namespace Modules\Cart\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Carts extends Component
{
    #[Layout('homepage::layouts.master'),Title('صفحه سبد خرید')]
    public function render():View
    {
        return view('cart::livewire.carts');
    }
}
