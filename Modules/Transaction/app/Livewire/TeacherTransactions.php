<?php

namespace Modules\Transaction\Livewire;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherTransactions extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    #[Computed]
    public function transactions(): Paginator
    {
        return \Modules\Transaction\Models\TeacherTransactions::query()
            ->where('user_id', auth()->user()->id)->paginate(10);
    }

    #[Layout('panel::layouts.app'),Title('لیست تراکنش های مدرس')]
    public function render():View
    {
        return view('transaction::livewire.teacher-transactions');
    }
}
