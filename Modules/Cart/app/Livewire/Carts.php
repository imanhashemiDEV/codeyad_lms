<?php

namespace Modules\Cart\Livewire;

use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Cart\Models\Cart;
use Modules\Coupon\app\Enums\CouponStatus;
use Modules\Coupon\Models\Coupon;

class Carts extends Component
{
    use LivewireAlert;

    public $coupon_code;
    public $total_price;
    public $coupon_discount = 0;

    public function deleteCartCourse($cart_id): void
    {
        Cart::destroy($cart_id);
        $this->alert('success', 'دوره از سبد شما حذف شد');
    }

    public function checkCoupon()
    {
        if($this->coupon_code){
            $coupon = Coupon::query()
                ->where('coupon_code', $this->coupon_code)
                ->where('status', CouponStatus::Active->value)
                ->first();
            if($coupon){
                $this->coupon_discount = ($this->total_price * $coupon->coupon_percent)/100;
            }else{
                $this->alert('error', 'کد تخفیف معتبر نمی باشد');
            }
        }
    }
    #[Layout('homepage::layouts.master'),Title('صفحه سبد خرید')]
    public function render():View
    {
        $carts =  Cart::query()->where('user_id', auth()->user()->id)
            ->get();
        $this->total_price=0;
        $total_discount= 0;

         foreach ($carts as $cart) {
             $this->total_price += $cart->course->price;
             $total_discount += ($cart->course->price * $cart->course->discount)/100;
         }
          if(!count($carts)){
              $this->coupon_discount =0;
          }
         $total_discount += $this->coupon_discount;

        return view('cart::livewire.carts', compact('total_discount', 'carts'));
    }
}
