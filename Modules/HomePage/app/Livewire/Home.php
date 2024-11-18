<?php

namespace Modules\HomePage\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Category\Models\Category;

class Home extends Component
{

    public $selected_tab=7;

    public function setSelectedTab($category_id)
    {
        $this->selected_tab=$category_id;
    }
    #[Computed]
    public function categories()
    {
        return Category::query()
//            ->where('parent_id','!=', null)
            ->whereIn('id',[7,10,11])
            ->limit(5)->get();
    }
    #[Layout('homepage::layouts.master'),Title('صفحه اصلی')]
    public function render():View
    {
        return view('homepage::livewire.home');
    }
}
