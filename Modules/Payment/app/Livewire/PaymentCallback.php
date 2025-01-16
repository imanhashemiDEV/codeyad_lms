<?php

namespace Modules\Payment\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Modules\Coupon\Models\Coupon;
use Modules\Order\app\Enums\OrderStatus;
use Modules\Order\Models\Order;
use Modules\Student\Models\StudentCourse;
use Modules\Transaction\app\Enums\TransactionType;
use Modules\Transaction\Models\StudentTransactions;
use Modules\Transaction\Models\TeacherTransactions;

class PaymentCallback extends Component
{
    #[Url]
    public $Authority;
    #[Url]
    public $Status;
    public $order;

    public $total_price,$total_discount;
    public $coupon_discount = 0;

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
                StudentCourse::setStudentCourse($this->order);

                // step 3 set transactions
                StudentTransactions::query()->create([
                    'user_id'=> $this->order->user_id,
                    'amount'=> $this->order->total_price - $this->order->discount,
                    'description'=> " پرداخت برای خرید سفارش {$this->order->order_code }",
                    'transaction_type'=>TransactionType::Pay->value
                ]);


                foreach ($this->order->orderDetails as $detail){
                    TeacherTransactions::query()->create([
                        'user_id'=> $detail->course->user_id,
                        'amount'=>$detail->price,
                        'description'=> " پرداخت برای خرید دوره {$detail->course->title} ",
                        'transaction_type'=>TransactionType::Receive->value
                    ]);

                    if($detail->discount > 0){
                        TeacherTransactions::query()->create([
                            'user_id'=> $detail->course->user_id,
                            'amount'=>($detail->price * $detail->discount)/100,
                            'description'=> "  تخفیف برای خرید دوره {$detail->course->title }",
                            'transaction_type'=>TransactionType::Pay->value
                        ]);
                    }

                    if($this->order->coupon_code){
                        $discount = Coupon::query()->where('coupon_code', $this->order->discount_code)->first();
                        TeacherTransactions::query()->create([
                            'user_id'=> $detail->course->user_id,
                            'amount'=> ($detail->course->price * $discount->coupon_percent)/100,
                            'description'=> "  تخفیف عمومی برای سفارش {$this->order->discount_code} با کد تخفیف {$this->order->order_code} ",
                            'transaction_type'=>TransactionType::Pay->value
                        ]);
                    }

                    // commission 40%
                    TeacherTransactions::query()->create([
                        'user_id'=> $detail->course->user_id,
                        'amount'=>($detail->course->price * 40)/100,
                        'description'=> " پرداخت کمیسیون برای فروش دوره {$detail->course->title}",
                        'transaction_type'=>TransactionType::Pay->value
                    ]);
                }

                DB::commit();

            }catch (\Exception $exception){
                DB::rollBack();
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
