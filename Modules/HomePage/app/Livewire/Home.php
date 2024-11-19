<?php

namespace Modules\HomePage\Livewire;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Category\Models\Category;

class Home extends Component
{

    public $selected_tab;

    public function mount(): void
    {
       $this->selected_tab = Category::query()
            ->select('categories.*')
           ->join('courses','categories.id','=','courses.category_id')
           ->orderBy('courses.viewed','DESC')
           ->first()->id;
    }

    public function setSelectedTab($category_id): void
    {
        $this->selected_tab=$category_id;
    }
    #[Computed]
    public function categories():Collection
    {
        return Category::query()
            ->select('categories.*')
            ->join('courses','categories.id','=','courses.category_id')
            ->orderBy('courses.viewed','DESC')
            ->limit(5)->get();
    }
    #[Layout('homepage::layouts.master'),Title('صفحه اصلی')]
    public function render():View
    {
        return view('homepage::livewire.home');
    }
}
