<?php

namespace Pyjac\Techphin\Http\Controllers;

use Pyjac\Techphin\Category;
use Pyjac\Techphin\Comment;
use Pyjac\Techphin\Http\Requests\CommentRequest;
use Pyjac\Techphin\Http\Requests\SearchRequest;
use Pyjac\Techphin\Tag;
use Pyjac\Techphin\User;
use Pyjac\Techphin\Video;

class PagesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()) {
            return redirect('/videos');
        }
        $videos = Video::popular()->get();
        $categories = Category::select(['id', 'name', 'icon'])->get();

        return view('welcome', compact('videos', 'categories'));
    }

    /**
     * Show videos list.
     *
     * @return \Illuminate\Http\Response
     */
    public function videos()
    {
        $videos = Video::with(['category', 'owner'])->paginate(12);
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
        $relatedVideos = $video->relatedVideos()->get();
        if (empty($relatedVideos)) {
            $relatedVideos = $video->relatedCategoryVideos()->get();
        }
        $comments = $video->comments()->get();

        return view('video', compact('video', 'relatedVideos', 'comments'));
    }

    /**
     * Show videos list.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryVideos(Category $category)
    {
        $videos = $category->videos()->paginate(12);
        $categories = Category::select(['id', 'name', 'icon'])->get();

        return view('category_videos', compact('category', 'videos', 'categories'));
    }

    /**
     * Search videos.
     *
     * @return \Illuminate\Http\Response
     */
    public function videosSearch(SearchRequest $request)
    {
        $queryString = $request->get('queryString');
        $videos = Video::search($queryString)->paginate(12);
        $categories = Category::select(['id', 'name', 'icon'])->get();

        return view('search_videos', compact('queryString', 'videos', 'categories'));
    }

    /**
     * Show videos list.
     *
     * @return \Illuminate\Http\Response
     */
    public function tagVideos(Tag $tag)
    {
        $videos = $tag->videos()->paginate(12);
        $categories = Category::select(['id', 'name', 'icon'])->get();

        return view('tag_videos', compact('tag', 'videos', 'categories'));
    }

    /**
     * Comment on a video.
     *
     * @return \Illuminate\Http\Response
     */
    public function commentVideo(CommentRequest $request, Video $video)
    {
        $comment = new Comment(
                    [
                        'body'        => $request->get('body'),
                        'user_id'     => auth()->user()->id,
                    ]);
        $comment = $video->comments()->save($comment);

        return redirect()->back();
    }

    /**
     * Show user videos list.
     *
     * @return \Illuminate\Http\Response
     */
    public function userVideos(User $user)
    {
        $videos = $user->videos()->paginate(12);
        $categories = Category::select(['id', 'name', 'icon'])->get();

        return view('user_videos', compact('user', 'videos', 'categories'));
    }
}
