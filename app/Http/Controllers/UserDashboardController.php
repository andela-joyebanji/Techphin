<?php

namespace Pyjac\Techphin\Http\Controllers;

use Cloudder;
use Pyjac\Techphin\Category;
use Pyjac\Techphin\Http\Requests\UserProfileRequest;
use Pyjac\Techphin\Tag;
use Pyjac\Techphin\Video;

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
     * Show user profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('user.profile');
    }

    /**
     * Show user profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UserProfileRequest $request)
    {
        auth()->user()->update($request->all());

        $image = $request->file('image');
        if ($image && $image->isValid()) {
            $avatar = Cloudder::upload($image, null, [
                'format' => 'jpg',
                'crop'   => 'fill',
                'width'  => 250,
                'height' => 250,
                ]);
            auth()->user()->update(['image' => Cloudder::getResult()['url']]);
        }

        return redirect()->back()->with('success', 'Profile Updated');
    }

    /**
     * Show user uploaded videos page.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploaded()
    {
        $videos = auth()->user()->videos()->paginate(12);

        return view('user.uploaded', compact('videos'));
    }

    /**
     * Show user favourited videos page.
     *
     * @return \Illuminate\Http\Response
     */
    public function favourited()
    {
        return view('user.favourited');
    }

    /**
     * Show video edit form.
     *
     * @return \Illuminate\Http\Response
     */
    public function video(Video $video)
    {
        if (!auth()->user()->videos()->find($video->id)) {
            return redirect('/user/uploaded');
        }
        $categories = Category::select(['id', 'name', 'icon'])->get();
        $tags = Tag::select(['name'])->get();

        return view('user.editVideo', compact('video', 'tags', 'categories'));
    }
}
