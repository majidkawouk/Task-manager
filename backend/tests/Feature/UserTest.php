<?php

use function Pest\Laravel\postJson;

test('a user can register', function () {
    $response = $this->postJson('/api/register', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertStatus(200)
             ->assertJsonStructure([
                 'message',
                 'user' => ['id', 'name', 'email']
               
             ]);
});


test('a user can log in', function () {
  
    $user = \App\Models\User::factory()->create([
        'name' => 'majd',
        'password' => '42',
    ]);

    
    $response = $this->postJson('/api/login', [
        'name'     => 'majd',
        'password' => '42',
    ]);

  
    $response->assertStatus(200)
             ->assertJsonStructure([
                 'message',
                 'token',
                 'user'
             ]);
});