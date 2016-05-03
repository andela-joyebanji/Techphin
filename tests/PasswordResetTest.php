<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery as m;

class PasswordResetTest extends TestCase
{
    use DatabaseTransactions;

    public function testPasswordResetRedirectWhenLoggedIn()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $this->actingAs($user)->visit('/password/reset')
             ->see('/videos');
    }

    public function testPasswordResetErrorInvalidEmail()
    {
        $this->visit('/password/reset')
             ->type('jadasdf', 'email')
             ->press('Send Password Reset Link')
             ->see('The email must be a valid email address.');
    }

    public function testPasswordResetErrorEmailNotExist()
    {
        $this->visit('/password/reset')
             ->type('oye@oye.com', 'email')
             ->press('Send Password Reset Link')
             ->see("We can't find a user with that e-mail address.");
    }

    public function testPasswordResetEmailSent()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $mock = m::mock($this->app['mailer']->getSwiftMailer());
        $this->app['mailer']->setSwiftMailer($mock);
        $mock
                ->shouldReceive('send')
                ->withArgs([m::on(function ($message) use ($user) {
                    $this->assertEquals('Your Password Reset Link', $message->getSubject());
                    $this->assertSame([$user->email => null], $message->getTo());
                    $this->assertContains('Click here to reset your password:', $message->getBody());

                    return true;
                }), m::any()])
                ->once();

        $this->visit('/password/reset')
             ->type($user->email, 'email')
             ->press('Send Password Reset Link');
    }

    public function testPasswordReset()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $mock = m::mock($this->app['mailer']->getSwiftMailer());
        $this->app['mailer']->setSwiftMailer($mock);
        $mock
                ->shouldReceive('send')
                ->withArgs([m::on(function ($message) use ($user) {
                    return true;
                }), m::any()])
                ->once();

        $this->visit('/password/reset')
             ->type($user->email, 'email')
             ->press('Send Password Reset Link');
        $uuid = DB::table('password_resets')
                        ->where('email', '=', $user->email)
                        ->value('token');
        $this->visit('/password/reset/'.$uuid)
                    ->type($user->email, 'email')
                    ->type('123456', 'password')
                    ->type('123456', 'password_confirmation')
                    ->press('Reset Password')
                    ->seePageIs('/videos');
    }
}
