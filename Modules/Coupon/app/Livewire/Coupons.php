<?php

namespace Modules\Coupon\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Coupon\Models\Coupon;
use Modules\Coupon\app\Helpers\CouponCodeGenerator;

class Coupons extends Component
{
    use WithPagination;

    public $title;
    public $coupon_code;
    public $coupon_percent;
    public $editedIndex;
    protected $paginationTheme = 'bootstrap';


    public function createRow(): void
    {
        Coupon::query()->create([
            'title' => $this->title,
            'coupon_code' => CouponCodeGenerator::generateRandomString(6),
            'coupon_percent' => $this->coupon_percent,
        ]);

        $this->reset('title', 'coupon_percent');
        session()->flash('message', 'کد تخفیف ایجاد شد');
    }

    public function editRow($id)
    {
        $coupon = Coupon::query()->find($id);
        $this->title = $coupon->title;
        $this->coupon_percent = $coupon->coupon_percent;
        $this->editedIndex=$id;
    }

    public function updateRow()
    {
        Coupon::query()->find($this->editedIndex)->update([
            'title' => $this->title,
            'coupon_percent' => $this->coupon_percent
        ]);

        $this->reset('title', 'coupon_percent');
        session()->flash('message', 'کد تخفیف ویرایش شد');
        $this->editedIndex=null;
    }


    #[Layout('panel::layouts.app'),Title('لیست کدهای تخفیف')]
    public function render():View
    {
        return view('coupon::livewire.coupons');
    }
}
