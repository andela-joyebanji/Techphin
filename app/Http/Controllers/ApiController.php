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
}
