<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Pyjac\Techphin\Category;
use Pyjac\Techphin\User;

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
             ->see($video->favourites().' favourites');
    }

    public function testVideoPageViews()
    {
        $video = factory(Pyjac\Techphin\Video::class)->create();
        $this->visit('/videos/'.$video->id)
             ->see(($video->views + 1).' views');
    }

    public function testCategoryVideos()
    {
        $category = factory(Pyjac\Techphin\Category::class)->create();
        $this->visit('/videos/category/'.$category->name)
             ->see('Videos in Category : '.$category->name);
    }

    public function testTagVideos()
    {
        $tag = factory(Pyjac\Techphin\Tag::class)->create();
        $this->visit('/videos/tag/'.$tag->name)
             ->see('Videos in Tag : '.$tag->name);
    }

    public function testUserVideos()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $video = factory(Pyjac\Techphin\Video::class)->create();
        $user->videos()->save($video);
        $this->visit('/videos/user/'.$user->username)
             ->see(str_limit($video->title, 70));
    }

    public function testAuthorizedUserRedirectToVideos()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $this->actingAs($user)
           ->visit('/')
           ->seePageIs('/videos');
    }

    public function testAuthorizedUserRedirectFromLogin()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $this->actingAs($user)
           ->visit('/login')
           ->seePageIs('/videos');
    }

    public function testHomePage()
    {
        $this->visit('/')
             ->see('Popular Videos')
             ->see('Browse, Learn and Upload');
    }
}
