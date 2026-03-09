<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Mockery;
use Tests\TestCase;

class OAuthLoginTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    public function test_google_oauth_rejects_unregistered_email()
    {
        $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
        $abstractUser->shouldReceive('getId')
            ->andReturn(rand())
            ->shouldReceive('getName')
            ->andReturn('Test User')
            ->shouldReceive('getEmail')
            ->andReturn('unregistered@test.com')
            ->shouldReceive('getAvatar')
            ->andReturn('https://en.gravatar.com/userimage');

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        $response = $this->get('/auth/google/callback');

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['email' => 'Your account is not registered or inactive. Contact Administrator.']);
        $this->assertGuest();
    }

    public function test_google_oauth_accepts_registered_email()
    {
        $user = tap(User::factory()->create(['email' => 'registered@test.com', 'is_active' => true]))->assignRole('admin');

        $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
        $abstractUser->shouldReceive('getId')
            ->andReturn('12345')
            ->shouldReceive('getName')
            ->andReturn($user->name)
            ->shouldReceive('getEmail')
            ->andReturn($user->email)
            ->shouldReceive('getAvatar')
            ->andReturn('https://en.gravatar.com/userimage');

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        $response = $this->get('/auth/google/callback');

        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($user);
    }
}
