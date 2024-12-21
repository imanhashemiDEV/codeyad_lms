<?php

namespace Modules\Coupon\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Coupons extends Component
{
    use WithPagination;

    #[Layout('panel::layouts.app'),Title('لیست نظرات دوره ها')]
    public function render():View
    {
        return view('coupon::livewire.coupons');
    }
}
