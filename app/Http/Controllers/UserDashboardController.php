<?php

namespace Pyjac\Techphin\Http\Controllers;

use Pyjac\Techphin\Http\Requests;
use Pyjac\Techphin\Category;
use Pyjac\Techphin\Video;
use Pyjac\Techphin\Tag;
use Pyjac\Techphin\Http\Requests\VideoUploadRequest;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dashboard');
    }

    /**
     * Show the upload page.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        $categories = Category::select(['id', 'name', 'icon'])->get();
        $tags = Tag::select(['name'])->get();
        return view('user.upload', compact('categories'), compact('tags'));
    }

    /**
     * Show user uploaded videos page.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploaded()
    {
        return view('user.uploaded');
    }

    /**
     * Upload the video.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeVideo(VideoUploadRequest $request)
    {
        $video = new Video($request->all());
        $video = $request->user()->videos()->save($video);
        $video->attachTagsToVideo(explode(',', $request->tags));
        return redirect()->back()->with('success', "Video Successfully Uploaded. Click <a href='/videos/$video->id'>here</a> to view video");
    }
}
