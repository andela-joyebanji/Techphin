<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Pyjac\Techphin\User;
use Pyjac\Techphin\Category;

class PageTest extends TestCase
{
    use DatabaseTransactions;

    public function testVideoListingPage()
    {
        $this->visit('/videos')
             ->see('All Videos');
    }
}



