<?php

namespace Modules\RolePermissions\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;

    public $name;
    public $editedIndex;
    protected $paginationTheme = 'bootstrap';


    public function createRole(): void
    {
        Role::query()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');
        session()->flash('message', 'نقش ایجاد شد');
    }

    public function editRow($id)
    {
        $role = Role::query()->find($id);
        $this->name = $role->name;
        $this->editedIndex=$id;
    }

    public function updateRow()
    {
        Role::query()->find($this->editedIndex)->update([
            'name' => $this->name,
        ]);

        $this->reset('name');
        session()->flash('message', 'نقش ویرایش شد');
        $this->editedIndex=null;
    }

    #[On('destroy-role')]
    public function destroyRole($id)
    {
        Role::destroy($id);
    }

    #[Layout('panel::layouts.app'),Title('نقش ها')]
    public function render()
    {
        $roles = Role::query()->paginate(10);
        return view('rolepermissions::livewire.roles',compact('roles'));
    }
}
