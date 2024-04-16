<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use WithFaker;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_create_user(): void
    {
        $response = $this->post('/api/v1/user/save', [
            'selectCountry' => '{"name":"Brunei","flag":"🇧🇳","idd":"+673"}',
            'name' => $this->faker->name,
            'phone' => '22 222-22-22',
            'email' => $this->faker->email
        ]);

        $response->assertStatus(200);
    }
}
