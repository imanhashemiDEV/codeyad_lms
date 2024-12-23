<?php

namespace Modules\Coupon\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Coupon\app\Enums\CouponStatus;
use Modules\Coupon\Models\Coupon;
use Modules\Coupon\app\Helpers\CouponCodeGenerator;

class Coupons extends Component
{
    use WithPagination;

    #[Validate('required')]
    public $title;
    public $coupon_code;
    #[Validate('required')]
    public $coupon_percent;
    public $editedIndex;
    protected $paginationTheme = 'bootstrap';


    public function createRow(): void
    {
        $this->validate();
        Coupon::query()->create([
            'title' => $this->title,
            'coupon_code' => CouponCodeGenerator::generateRandomString(6),
            'coupon_percent' => $this->coupon_percent,
        ]);

        $this->reset('title', 'coupon_percent');
        session()->flash('message', 'کد تخفیف ایجاد شد');
    }

    public function editRow($id): void
    {
        $coupon = Coupon::query()->find($id);
        $this->title = $coupon->title;
        $this->coupon_percent = $coupon->coupon_percent;
        $this->editedIndex=$id;
    }

    public function updateRow(): void
    {
        $this->validate();
        Coupon::query()->find($this->editedIndex)->update([
            'title' => $this->title,
            'coupon_percent' => $this->coupon_percent
        ]);

        $this->reset('title', 'coupon_percent');
        session()->flash('message', 'کد تخفیف ویرایش شد');
        $this->editedIndex=null;
    }

    public function changeCouponStatus($coupon_id): void
    {
        $coupon = Coupon::query()->find($coupon_id);
        if($coupon->status === CouponStatus::Active->value){
            $coupon->update([
                'status'=>CouponStatus::Expired->value
            ]);
        }elseif ($coupon->status === CouponStatus::Expired->value){
            $coupon->update([
                'status'=>CouponStatus::Active->value
            ]);
        }
    }


    #[Layout('panel::layouts.app'),Title('لیست کدهای تخفیف')]
    public function render():View
    {
        $coupons = Coupon::query()->paginate(10);
        return view('coupon::livewire.coupons', compact('coupons'));
    }
}
