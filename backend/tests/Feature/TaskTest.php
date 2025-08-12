<?php

use App\Models\User;

use Laravel\Sanctum\Sanctum;

use function Pest\Laravel\get;

test('admin can see tasks', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    Sanctum::actingAs($admin);

    $response = $this->getJson('/api/showtasks');

    $response->assertStatus(200);
});

test('non-admin cannot see tasks and Tasks', function () {
    $user = User::factory()->create(['is_admin' => false]);

    Sanctum::actingAs($user);

    $response = $this->getJson('/api/showtasks');

    $response->assertStatus(403);
});


test('show my tasks',function(){

    $user = User::factory()->create();
   
    $response = $this->actingAs($user)->getJson("/api/showtasks/124");

     $response->assertStatus(200);

});