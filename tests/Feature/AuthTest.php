<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('MASUK KE AKUN MARVEL');
    }

    public function test_register_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('BUAT AKUN MARVEL');
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'fazriel@marvel.com'],
            ['name' => 'Fazriel', 'password' => Hash::make('password123')]
        );

        $response = $this->post('/login', [
            'email' => 'fazriel@marvel.com',
            'password' => 'password123',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('home'));
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'fazriel@marvel.com'],
            ['name' => 'Fazriel', 'password' => Hash::make('password123')]
        );

        $this->post('/login', [
            'email' => 'fazriel@marvel.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'fazriel@marvel.com'],
            ['name' => 'Fazriel', 'password' => Hash::make('password123')]
        );

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect(route('home'));
    }

    public function test_home_screen_displays_guest_sign_in_when_not_logged_in(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('SIGN IN');
        $response->assertSee('JOIN');
    }

    public function test_home_screen_displays_user_name_and_dropdown_when_logged_in(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'fazriel@marvel.com'],
            ['name' => 'Fazriel', 'password' => Hash::make('password123')]
        );

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
        $response->assertSee('FAZRIEL');
        $response->assertSee('Verify Your Email To Complete Registration');
        $response->assertSee('MY DIGITAL COMICS PURCHASES');
        $response->assertSee('LOG OUT');
    }
}
