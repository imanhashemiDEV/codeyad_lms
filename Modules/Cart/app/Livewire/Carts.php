<?php

namespace Modules\Cart\Livewire;

use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Cart\Models\Cart;

class Carts extends Component
{
    use LivewireAlert;

    public function deleteCartCourse($cart_id)
    {
        Cart::destroy($cart_id);
        $this->alert('success', 'دوره از سبد شما حذف شد');
    }
    #[Layout('homepage::layouts.master'),Title('صفحه سبد خرید')]
    public function render():View
    {
        $carts =  Cart::query()->where('user_id', auth()->user()->id)->get();
        $total_price=0;
        $total_discount= 0;

         foreach ($carts as $cart) {
             $total_price += $cart->course->price;
             $total_discount += ($cart->course->price * $cart->course->discount)/100;
         }

        return view('cart::livewire.carts', compact('total_price','total_discount', 'carts'));
    }
}
