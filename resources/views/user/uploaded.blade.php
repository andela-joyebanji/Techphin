@extends('layouts.dashboard')
@section('title', 'Uploaded Videos')
@include(
          'partials.dash-videos-list',
          [
            'videos' => Auth::user()->videos,
            'title'  => 'Uploaded Videos'
          ]
        )
