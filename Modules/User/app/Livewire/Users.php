<?php

namespace Modules\User\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Category\Models\Category;
use Modules\User\app\Models\User;

class Users extends Component
{
    use WithPagination;

    public $parent_id=0;
    public $title;
    public $editedIndex;
    protected $paginationTheme = 'bootstrap';


    public function createCategory(): void
    {
        Category::query()->create([
            'title' => $this->title,
            'parent_id' => $this->parent_id
        ]);

        $this->reset('title', 'parent_id');
        session()->flash('message', 'دسته بندی ایجاد شد');
    }

    public function editRow($id)
    {
        $category = Category::query()->find($id);
        $this->title = $category->title;
        $this->parent_id = $category->parent_id;
        $this->editedIndex=$id;
    }

    public function updateRow()
    {
        Category::query()->find($this->editedIndex)->update([
            'title' => $this->title,
            'parent_id' => $this->parent_id
        ]);

        $this->reset('title', 'parent_id');
        session()->flash('message', 'دسته بندی ایجاد شد');
        $this->editedIndex=null;
    }

    #[On('destroy-category')]
    public function destroyCategory($id)
    {
        Category::destroy($id);
    }

    #[Layout('panel::layouts.app'),Title('دسته بندی ها')]
    public function render()
    {
        $users = User::query()->paginate(10);
        return view('user::livewire.users', compact('users'));
    }
}
