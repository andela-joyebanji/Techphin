<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchTest extends TestCase
{
  use DatabaseTransactions;

  public function testSearch()
  {
    $video = factory(Pyjac\Techphin\Video::class)->create();
    $response = $this->call('GET', '/search?queryString='.$video->title);

    $this->assertContains($video->title, $response->getContent());

  }

  public function testSearchNoResult()
  {
    $response = $this->call('GET', '/search?queryString=LOL');

    $this->assertContains("( No video found for your search.", $response->getContent());

  }
}
