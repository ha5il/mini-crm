<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    public function test_registration_screen_cannot_be_rendered_without_auth()
    {
        $response = $this->get('/employee');

        $response->assertStatus(302);
    }

    public function test_registration_screen_cannot_be_rendered_with_auth()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->get('/employee');

        $response->assertStatus(200);
    }

    public function test_new_employee_can_be_created_with_auth()
    {
        $user = User::factory()->create();
        $company = Company::factory()->create();

        Livewire::actingAs($user);

        Livewire::test(\App\Http\Livewire\Employee\EditEmployee::class, [
            'id' => 'new'
        ])
            ->set([
                'first_name' => 'abc',
                'last_name' => 'def',
                'company_id' => $company->id,
            ])
            ->call('formSubmitted');

        $this->assertDatabaseHas('employees', [
            'first_name' => 'abc',
            'last_name' => 'def',
            'company_id' => $company->id,
        ]);
    }

    public function test_new_employee_can_be_edited_with_auth()
    {
        $user = User::factory()->create();
        $company = Company::factory()->create();
        $employee = Employee::factory()->create([
            'company_id' => $company->id,
        ]);

        Livewire::actingAs($user);

        Livewire::test(\App\Http\Livewire\Employee\EditEmployee::class, [
            'id' => $employee->id
        ])
            ->set([
                'first_name' => 'abc',
                'last_name' => 'def',
            ])
            ->call('formSubmitted');

        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'first_name' => 'abc',
            'last_name' => 'def',
            'company_id' => $company->id,
        ]);
    }
}
