<?php

namespace Modules\Payment\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
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
    public $order;

    public function mount()
    {
        $this->order = Order::query()->where('transaction_id',$this->Authority)->first();
        if($this->Status==="OK"){
            $this->order->update([
                'status'=>OrderStatus::Successful->value
            ]);
        }else{
            $this->order->update([
                'status'=>OrderStatus::Failed->value
            ]);
        }
    }

    #[Layout('homepage::layouts.master'),Title('صفحه نتیجه پرداخت')]
    public function render():View
    {
        return view('payment::livewire.payment-callback');
    }
}
