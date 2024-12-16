<?php

namespace Modules\Cart\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Cart\Models\Cart;

class Carts extends Component
{
    public $carts;
    public function mount(): void
    {
      $this->carts =  Cart::query()->where('user_id', auth()->user()->id)->get();
    }
    #[Layout('homepage::layouts.master'),Title('صفحه سبد خرید')]
    public function render():View
    {
        return view('cart::livewire.carts');
    }
}
