<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SslTest extends TestCase
{
  use DatabaseTransactions;

  public function testSSLProduction()
  {
    $old = env('APP_ENV');
    putenv('APP_ENV=production');
    $this->visit('/')->see(url('/', [], true));
    putenv('APP_ENV='.$old);
  }

  public function testSSLLocal()
  {
    $old = env('APP_ENV');
    putenv('APP_ENV=local');
    $this->visit('/')->see(url('/'));
    putenv('APP_ENV='.$old);
  }

}
