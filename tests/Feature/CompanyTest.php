<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    public function test_registration_screen_cannot_be_rendered_without_auth()
    {
        $response = $this->get('/company');

        $response->assertStatus(302);
    }

    public function test_registration_screen_cannot_be_rendered_with_auth()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->get('/company');

        $response->assertStatus(200);
    }

    public function test_new_company_can_be_created_with_auth()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->post('/company', [
            'name' => 'abc',
            'email' => 'abc@example.com',
        ]);

        $this->assertDatabaseHas('companies', [
            'name' => 'abc',
            'email' => 'abc@example.com',
        ]);
    }
}
