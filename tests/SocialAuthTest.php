<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Socialite\Facades\Socialite;

use Pyjac\Techphin\User;
use Pyjac\Techphin\Category;

class SocialAuthTest extends TestCase
{
    use DatabaseTransactions;

    public function testSocialAuthCallback()
    {
      $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
      $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
      $abstractUser->shouldReceive('getId')
                  ->andReturn(1233444444)
                  ->shouldReceive('getEmail')
                  ->andReturn('Jacob@jacob.com')
                  ->shouldReceive('getName')
                  ->andReturn('Oyebanji Jacob')
                  ->shouldReceive('getAvatar')
                  ->andReturn('Llooooo');
      $provider->shouldReceive('user')->andReturn($abstractUser);
      Socialite::shouldReceive('driver')->with('facebook')->andReturn($provider);
      $this->visit('auth/facebook/callback')
          ->seePageIs('/videos');
    }

    public function testSocialAuthCallbackReturnRegisteredUser()
    {
      $user = factory(Pyjac\Techphin\User::class)->create();
      $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
      $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
      $abstractUser->shouldReceive('getId')
                  ->andReturn(1233444444)
                  ->shouldReceive('getEmail')
                  ->andReturn($user->email)
                  ->shouldReceive('getName')
                  ->andReturn('Oyebanji Jacob')
                  ->shouldReceive('getAvatar')
                  ->andReturn('Llooooo');
      $provider->shouldReceive('user')->andReturn($abstractUser);
      Socialite::shouldReceive('driver')->with('facebook')->andReturn($provider);
      $this->visit('auth/facebook/callback')
          ->seePageIs('/videos');
    }

    public function testSocialAuthCallbackReturnRegisteredUser2()
    {
      $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
      $providerName = class_basename($provider);
      $socialAccount = factory(Pyjac\Techphin\SocialAccount::class)->create([ 'provider' => $providerName]);
      $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
      $abstractUser->shouldReceive('getId')
                  ->andReturn($socialAccount->provider_user_id)
                  ->shouldReceive('getEmail')
                  ->andReturn($socialAccount->user->email)
                  ->shouldReceive('getName')
                  ->andReturn('Oyebanji Jacob')
                  ->shouldReceive('getAvatar')
                  ->andReturn('Llooooo');
      $provider->shouldReceive('user')->andReturn($abstractUser);
      Socialite::shouldReceive('driver')->with('facebook')->andReturn($provider);
      $this->visit('auth/facebook/callback')
          ->seePageIs('/videos');
    }

}