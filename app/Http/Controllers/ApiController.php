<?php

namespace Pyjac\Techphin\Http\Controllers;

use Pyjac\Techphin\Video;

class ApiController extends Controller
{
    public function favourite(Video $video)
    {
        $favouriteState = auth()->user()->favourite($video->id);

        return ['state' => $favouriteState];
    }

    public function deleteVideo(Video $video)
    {
        $video = auth()->user()->videos()->find($video->id);
        if (is_null($video)) {
            return ['state' => "Can't Delete A Video You don't own."];
        }
        $video->delete();

        return ['state' => 'deleted'];
    }
}
