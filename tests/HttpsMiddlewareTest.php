<?php

class HttpsMiddlewareTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHttpsProduction()
    {
        $old = env('APP_ENV');
        putenv('APP_ENV=production');
        $this->visit('/')->seePageIs(url('/', [], true));
        putenv('APP_ENV='.$old);
    }

    public function testHttpsLocal()
    {
        $old = env('APP_ENV');
        putenv('APP_ENV=local');
        $this->visit('/')->seePageIs(url('/'));
        putenv('APP_ENV='.$old);
    }
}
