<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_register(){
        $response = $this->post('/register',[
            'name' => 'unit_test',
            'email' => 'unit_test@g.c',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'role' => 'Owner',
        ]);

        $response->assertRedirect('/home');
    }
}
