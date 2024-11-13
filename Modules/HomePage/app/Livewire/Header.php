<?php

namespace Modules\HomePage\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\Category\Models\Category;

class Header extends Component
{
//    public function mount()
//    {
//        Cache::forget('homepage-categories');
//    }
    #[Computed(cache: true , key: 'homepage-categories')]
    public function categories()
    {
      return Category::query()->where('parent_id',0)->get();
    }
    public function render():View
    {
        return view('homepage::livewire.header');
    }
}
