<?php

namespace Modules\Payment\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Modules\Order\app\Enums\OrderStatus;
use Modules\Order\Models\Order;

class PaymentCallback extends Component
{
    #[Url]
    public $Authority;
    #[Url]
    public $Status;

    public function mount()
    {
        $order = Order::query()->where('transaction_id',$this->Authority)->first();
        if($this->Status==="OK"){
            $order->update([
                'status'=>OrderStatus::Successful->value
            ]);
        }else{
            $order->update([
                'status'=>OrderStatus::Failed->value
            ]);
        }
        dd('here');
    }

    public function render():View
    {
        return view('payment::livewire.payment-callback');
    }
}
