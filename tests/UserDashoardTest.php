<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserDashoardTest extends TestCase
{
    use DatabaseTransactions;

    public function testHomePage()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $this->actingAs($user)->visit('/user/dashboard')
             ->see('Dashboard');
    }

    public function testDashboardVideosViewCount()
    {
        //$user = factory(Pyjac\Techphin\User::class)->create();
        $video = factory(Pyjac\Techphin\Video::class)->create();
        $this->actingAs($video->owner)
             ->visit('/videos/'.$video->id)
             ->visit('/user/dashboard')
             ->see('<i class="icon unhide"></i> 1');
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

    public function testUpdateProfile()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $this->actingAs($user)
             ->visit('/user/profile')
             ->type('taju', 'firstname')
             ->press('Update Profile')
             ->see('Profile Updated');
    }

    public function testUpdateProfileUploadFile()
    {
        $user = factory(Pyjac\Techphin\User::class)->create();
        $this->actingAs($user)
             ->visit('/user/profile')
             ->attach(storage_path('Python.jpg'), 'image')
             ->press('Update Profile')
             ->see('Profile Updated');
    }

    public function testUnAuthorizedUserRedirectToLogin()
    {
        $this->visit('/user/upload')
             ->seePageIs('/login');

        $this->visit('/user/dashboard')
             ->seePageIs('/login');

        $this->json('POST', '/user/upload')
             ->see('Unauthorized.');

        $response = $this->call('POST', '/user/upload', []);
        $this->assertRedirectedTo('/login');
    }
}
