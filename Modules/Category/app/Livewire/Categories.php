<?php

namespace Modules\Category\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Category\Models\Category;

class Categories extends Component
{
    use WithPagination;

    public $parent_id=0;
    public $title;



    public function createCategory()
    {
        Category::query()->create([
            'title' => $this->title,
            'parent_id' => $this->parent_id
        ]);

        $this->reset('title', 'parent_id');
        session()->flash('message', 'دسته بندی ایجاد شد');
    }

    #[Layout('panel::layouts.app'),Title('دسته بندی ها')]
    public function render()
    {
        $parentCategories=Category::query()->where('parent_id',0)->pluck('title','id');
        $categories = Category::query()->paginate(10);
        return view('category::livewire.categories',compact('categories','parentCategories'));
    }
}
