<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserDashoardTest extends TestCase
{
    use DatabaseTransactions;

    public function testVideoUploadWhenAllFieldsArePassedCorrectly()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $category = factory(Pyjac\Techphin\Category::class)->create();

        $this->actingAs($user)
             ->visit('/user/upload')
             ->type('PHP Programming', 'title')
             ->type('https://www.youtube.com/watch?v=7TF00hJI78Y', 'link')
             ->type('PHP Programming', 'description')
             ->type('php,programming', 'tags')
             ->type($category->id, 'category_id')
             ->press('Upload')
             ->see('Video Successfully Uploaded.');
    }

    public function testVideoUploadFailWhenInvalidVideoLinkProvided()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $category = factory(Pyjac\Techphin\Category::class)->create();

        $this->actingAs($user)
             ->visit('/user/upload')
             ->type('PHP Programming', 'title')
             ->type('https://www.Invalid.com/watch?=7TF00hJI78Y', 'link')
             ->type('PHP Programming', 'description')
             ->type('php,programming', 'tags')
             ->type($category->id, 'category_id')
             ->press('Upload')
             ->see('The link format is invalid.');
    }

    public function testVideoUploadedNoVideos()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();

        $this->actingAs($user)
             ->visit('/user/uploaded')
             ->see(':( No videos here yet.');
    }

    public function testVideoFavouritedNoVideos()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();

        $this->actingAs($user)
             ->visit('/user/favourited')
             ->see(':( No videos here yet.');
    }

    public function testVideoFavourited()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $video = factory(Pyjac\Techphin\Video::class)->create();
        $user->favourites()->attach($video->id);
        $this->actingAs($user)
             ->visit('/user/favourited')
             ->see(str_limit($video->title, 70));
    }

    public function testVideoUploaded()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $category = factory(Pyjac\Techphin\Category::class)->create();
        $this->actingAs($user)
              ->visit('/user/upload')
              ->type('PHP Programming', 'title')
              ->type('https://www.youtube.com/watch?v=7TF00hJI78Y', 'link')
              ->type('PHP Programming', 'description')
              ->type('php,programming', 'tags')
              ->type($category->id, 'category_id')
              ->press('Upload')
             ->visit('/user/uploaded')
             ->see($user->videos()->first()->title);
    }

    public function testVideoUploadFailWhenTitleIsEmpty()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $category = factory(Pyjac\Techphin\Category::class)->create();
        $this->actingAs($user)
             ->visit('/user/upload')
             ->type('', 'title')
             ->type('https://www.youtube.com/watch?v=7TF00hJI78Y', 'link')
             ->type('PHP Programming', 'description')
             ->type('php,programming', 'tags')
             ->type($category->id, 'category_id')
             ->press('Upload')
             ->see('The title field is required.');
    }

    public function testVideoUploadFailWhenRequiredFieldsAreEmpty()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $this->actingAs($user)
             ->visit('/user/upload')
             ->type('', 'title')
             ->type('', 'link')
             ->type('', 'description')
             ->type('php,programming', 'tags')
             ->type('', 'category_id')
             ->press('Upload')
             ->see('The title field is required.')
             ->see('The link field is required.')
             ->see('The description field is required.')
             ->see('The category id field is required.');
    }

    public function testUnAuthorizedUserRedirectToLogin()
    {
        $this->visit('/user/upload')
             ->seePageIs('/login');

        $this->visit('/user/dashboard')
             ->seePageIs('/login');

        $response = $this->call('POST', '/user/upload', []);
        $this->assertRedirectedTo('/login');

    }
}
