<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class ListEmployee extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = [
        'deleteEmployee'
    ];

    public function render()
    {
        return view('livewire.employee.list-employee', [
            'employees' => Employee::when($this->search, function ($query) {
                $query->search(['first_name', 'last_name', 'email', 'phone', 'company.name'], $this->search);
            })
                ->select([
                    'id', 'first_name', 'last_name', 'email', 'phone', 'company_id', 'created_at'
                ])
                ->with([
                    'company:id,name'
                ])
                ->orderBy('id', 'desc')
                ->paginate(10),
        ]);
    }

    public function deleteEmployee($id)
    {
        $user = Employee::findOrFail($id);
        $user->delete();
        $this->emit('sweet-toast', ['success', 'Employee deleted']);
    }
}

