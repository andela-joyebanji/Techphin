<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    use DatabaseTransactions;

    public function testRegister()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $this->visit('/register')
             ->type('Oyebanji', 'firstname')
             ->type('Jacob', 'lastname')
             ->type('pyjac005', 'username')
             ->type('pyjac005@email.com', 'email')
             ->type('jacobu', 'password')
             ->type('jacobu', 'password_confirmation')
             ->press('Register')
             ->seePageIs('/videos');
    }

    public function testRegisterWithEmptyUsername()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $this->visit('/register')
             ->type('Oyebanji', 'firstname')
             ->type('Jacob', 'lastname')
             ->type('', 'username')
             ->type('pyjac005@email.com', 'email')
             ->type('jacobu', 'password')
             ->type('jacobu', 'password_confirmation')
             ->press('Register')
             ->see('The username field is required.');
    }

    public function testRegisterWithEmptyInputs()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $this->visit('/register')
             ->press('Register')
             ->see('The username field is required.')
             ->see('The email field is required.')
             ->see('The firstname field is required.')
             ->see('The lastname field is required.')
             ->see('The password field is required.');
    }

    public function testRegisterWithWrongConfirmPassword()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $this->visit('/register')
             ->type('Oyebanji', 'firstname')
             ->type('Jacob', 'lastname')
             ->type('pyjac005', 'username')
             ->type('pyjac005@email.com', 'email')
             ->type('jacobu', 'password')
             ->type('jacobu1', 'password_confirmation')
             ->press('Register')
             ->see('The password confirmation does not match.');
    }
}
