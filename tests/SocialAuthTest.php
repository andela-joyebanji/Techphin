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

      //Socialite::shouldReceive('driver')->with('facebook')->andReturn(true);
      //$this->visit('auth/facebook/callback');
    }

}