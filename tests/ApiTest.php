<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Pyjac\Techphin\User;
use Pyjac\Techphin\Category;

class ApiTest extends TestCase
{
  use DatabaseTransactions;

  public function testVideoListingPage()
  {
    $user = factory(Pyjac\Techphin\User::class)->create();
    $video = factory(Pyjac\Techphin\Video::class)->create();
    $this->actingAs($user)
         ->visit('/api/favourite/'.$video->id)
           ->see('{"state":1}')
           ->visit('/api/favourite/'.$video->id)
           ->see('{"state":-1}');
  }

  public function testDeleteVideoApi()
  {
    $video = factory(Pyjac\Techphin\Video::class)->create();
    $user = $video->owner()->first();
    $this->actingAs($user)
         ->visit('/api/videos/'.$video->id.'/delete')
           ->see('{"state":"deleted"}');
  }

  public function testDeleteVideoApiNotUserVideo()
  {
    $video = factory(Pyjac\Techphin\Video::class)->create();
    $video1 = factory(Pyjac\Techphin\Video::class)->create();
    $user = $video->owner()->first();
    $this->actingAs($user)
         ->visit('/api/videos/'.$video1->id.'/delete')
           ->see("Can't Delete A Video You don't own.");
  }

}