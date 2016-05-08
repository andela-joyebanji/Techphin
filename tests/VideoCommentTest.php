<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoComment extends TestCase
{
    use DatabaseTransactions;

    public function testVideoPageLoggedInUserWithNoComment()
    {
        $video = factory(Pyjac\Techphin\Video::class)->create();
        $user = factory(Pyjac\Techphin\User::class)->create();

        $this->actingAs($user)
         ->visit('/videos/'.$video->id)
        ->see('Add a Comment');
    }

    public function testVideoPageNoComment()
    {
        $video = factory(Pyjac\Techphin\Video::class)->create();
        $this->visit('/videos/'.$video->id)
        ->see('No Comments on this video yet.');
    }

    public function testVideoPageAddCommentMessage()
    {
        $video = factory(Pyjac\Techphin\Video::class)->create();
        $user = factory(Pyjac\Techphin\User::class)->create();
        $this->actingAs($user)
        ->visit('/videos/'.$video->id)
        ->see('Add a Comment');
    }

    public function testVideoPageAddComment()
    {
        $video = factory(Pyjac\Techphin\Video::class)->create();
        $user = factory(Pyjac\Techphin\User::class)->create();

        $this->actingAs($user)
        ->visit('/videos/'.$video->id)
        ->type('This is Andela', 'body')
        ->press('Add Comment')
        ->see('This is Andela');
    }

    public function testVideoPageAddEmptyComment()
    {
        $video = factory(Pyjac\Techphin\Video::class)->create();
        $user = factory(Pyjac\Techphin\User::class)->create();

        $this->actingAs($user)
        ->visit('/videos/'.$video->id)
        ->press('Add Comment')
        ->see('Please enter your comment');
    }
}
