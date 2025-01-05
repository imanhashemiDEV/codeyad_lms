<?php

namespace Modules\Payment\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Modules\Order\app\Enums\OrderStatus;
use Modules\Order\Models\Order;
use Modules\Student\Models\StudentCourse;

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
            DB::beginTransaction();
            try {
                // step 1 update order status
                $this->order->update([
                    'status'=>OrderStatus::Successful->value
                ]);

                // step 2 set student course
                foreach ($this->order->orderDetails as $detail){
                    StudentCourse::query()->create([
                        'user_id'=> $this->order->user_id,
                        'course_id'=>$detail->course_id
                    ]);
                }


                // step 3 set transactions



            }catch (\Exception $exception){
                Log::error($exception->getMessage());
            }

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
