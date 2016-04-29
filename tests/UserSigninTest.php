<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Pyjac\Techphin\User;
use Pyjac\Techphin\Category;

class UserSiginTest extends TestCase
{
    use DatabaseTransactions;

    public function testSiginSuccess()
    {
        $user = factory(Pyjac\Techphin\User::class)->create(['password' => bcrypt('jacobu') ]);
        $this->visit('/login')
             ->type($user->email, 'email')
             ->type('jacobu', 'password')
             ->press('Login')
             ->seePageIs('/videos');
    }

    public function testSiginUnregistered()
    {
        $this->visit('/login')
             ->type('unregistered@gmail.com', 'email')
             ->type('jacobu', 'password')
             ->press('Login')
             ->see('These credentials do not match our records.');
    }

    public function testSiginInvalidInputs()
    {
        $this->visit('/login')
             ->type('unregisteredgmail.com', 'email')
             ->type('jacob', 'password')
             ->press('Login')
             ->see('These credentials do not match our records.');
    }
  }
