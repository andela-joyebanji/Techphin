<?php

namespace Pyjac\Techphin\Http\Controllers;

use Pyjac\Techphin\Video;
use Pyjac\Techphin\Category;
use Pyjac\Techphin\Http\Requests;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show videos list.
     *
     * @return \Illuminate\Http\Response
     */
    public function videos()
    {
        $videos = Video::with(['category','owner'])->get();
        $categories = Category::select(['id', 'name', 'icon'])->get();
        return view('videos', compact('videos'), compact('categories'));
    }

    /**
     * Show videos list.
     *
     * @return \Illuminate\Http\Response
     */
    public function video(Video $video)
    {
      $relatedVideos = $video->relatedVideos();
      return view('video', compact('video', 'relatedVideos'));
    }
}