<?php

namespace Pyjac\Techphin\Http\Controllers;

use Illuminate\Http\Request;

use Pyjac\Techphin\Video;
use Pyjac\Techphin\Http\Requests;
use Pyjac\Techphin\Http\Requests\VideoUploadRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created video in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(VideoUploadRequest $request)
    {
        $video = new Video($request->all());
        $video = $request->user()->videos()->save($video);
        $video->attachTagsToVideo(explode(',', trim($request->tags)));

        return redirect()->back()->with('success', "Video Successfully Uploaded. Click <a href='/videos/$video->id'>here</a> to view video");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified video in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Pyjac\Techphin\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoUploadRequest $request, Video $video)
    {
        if (!auth()->user()->videos()->find($video->id)) {
            redirect('/user/uploaded');
        }

        $tags = implode(',', $video->tags->pluck('name')->all());
        $video->update($request->all());
        $video->detachTagsFromVideo(explode(',', trim($tags)));
        $video->attachTagsToVideo(explode(',', trim($request->tags)));

        return redirect()->back()->with('success', 'Video Successfully Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Pyjac\Techphin\Video  $video
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video = auth()->user()->videos()->find($video->id);
        if (is_null($video)) {
            return ['state' => "Can't Delete A Video You don't own."];
        }
        $video->delete();

        return ['state' => 'deleted'];
    }
}
