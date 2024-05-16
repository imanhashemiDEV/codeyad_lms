<?php

namespace Modules\RolePermissions\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use WithPagination;

    public $name;
    public $editedIndex;
    protected $paginationTheme = 'bootstrap';


    public function createPermission(): void
    {
        Permission::query()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');
        session()->flash('message', 'مجوز ایجاد شد');
    }

    public function editRow($id)
    {
        $permission = Permission::query()->find($id);
        $this->name = $permission->name;
        $this->editedIndex=$id;
    }

    public function updateRow()
    {
        Permission::query()->find($this->editedIndex)->update([
            'name' => $this->name,
        ]);

        $this->reset('name');
        session()->flash('message', 'مجوز ایجاد شد');
        $this->editedIndex=null;
    }

    #[On('destroy-permission')]
    public function destroyPermission($id)
    {
        Permission::destroy($id);
    }

    #[Layout('panel::layouts.app'),Title('مجوزها')]
    public function render()
    {
        $permissions = Permission::query()->paginate(10);
        return view('rolepermissions::livewire.permissions',compact('permissions'));
    }
}
