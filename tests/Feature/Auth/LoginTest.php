<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

test('login screen renders', function () {
    $response = $this->get(route('login'));

    $response->assertStatus(200);
});

test('login validation works', function () {
    $response = $this->post(route('login'));
    $response->assertSessionHasErrors(['login','password','remember']);
});

test('login rate limiter works', function () {
    $user = User::factory()->create();
    for ($i = 1;$i <= 6;$i++)
    {
        $response = $this->post(route('login'),[
            'login' => $user->email,
            'password' => Str::random(),
            'remember' => false
        ]);
        if ($i === 6)
        {
            $response->assertSessionHasErrors('throttle');
        }
    }
});

test('user can authenticate with credentials', function () {
    $password = Str::random();
    $user = User::factory()->create(['password' => $password]);
    $response = $this->post(route('login'),[
       'login' => $user->email,
       'password' => $password,
       'remember' => false
    ]);
    $this->assertAuthenticated();
    $response->assertRedirect();
});

test('user can\'t authenticated without credentials', function () {
    $user = User::factory()->create();

    $response = $this->post(route('login'),[
        'login' => $user->email,
        'password' => Str::random(),
        'remember' => false
    ]);

    $response->assertSessionHasErrors('failed');
});
