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

    public function testVideoPage()
    {
      $video = factory(Pyjac\Techphin\Video::class)->create();
      $this->visit('/videos/'.$video->id)
             ->see($video->description);
    }

    public function testVideoPageShowsFavourite()
    {
      $video = factory(Pyjac\Techphin\Video::class)->create();
      $this->visit('/videos/'.$video->id)
             ->see($video->favourites()." favourites");
    }

    public function testVideoPageViews()
    {
      $video = factory(Pyjac\Techphin\Video::class)->create();
      $this->visit('/videos/'.$video->id)
             ->see(($video->views + 1)." views");
    }

    public function testCategoryVideos()
    {
      $category = factory(Pyjac\Techphin\Category::class)->create();
      $this->visit('/videos/category/'.$category->name)
             ->see("Videos in Category : ".$category->name);
    }

    public function testHomePage()
    {
      $this->visit('/')
             ->see("Popular Videos")
             ->see("Browse, Learn and Upload");
    }
}
