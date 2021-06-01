<?php

namespace App\Http\Livewire\Employee;

use App\Models\Company;
use App\Models\Employee;
use Livewire\Component;

class EditEmployee extends Component
{
    public $employee_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $company_id;

    public $companies;

    protected $rules = [
        'first_name' => ['required', 'string', 'max:30'],
        'last_name' => ['required', 'string', 'max:30'],
        'email' => ['nullable', 'string', 'email', 'max:50'],
        'phone' => ['nullable', 'numeric', 'digits:10'],
        'company_id' => ['required', 'numeric', 'min:1'],
    ];

    public function mount($id)
    {
        $employee = ($id == 'new') ? new Employee() : Employee::findOrFail($id);

        $this->fill([
            'employee_id' => $employee->id,
            'first_name' => $employee->first_name,
            'last_name' => $employee->last_name,
            'email' => $employee->email,
            'phone' => $employee->phone,
            'company_id' => $employee->company_id,
        ]);

        Company::get(['id', 'name'])->each(function ($company) {
            $this->companies[$company->id] = $company->name;
        });
    }

    public function render()
    {
        return view('livewire.employee.edit-employee');
    }

    public function formSubmitted()
    {
        $validated = $this->validate();

        if ($this->employee_id) {
            Employee::find($this->employee_id)->update($validated);
        } else {
            $employee = Employee::create($validated);
        }
        $this->emit('sweet-toast', ['success', 'Employee info saved']);
        return redirect()->route('employee.index');
    }
}

