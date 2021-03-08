<?php

use Illuminate\Support\Facades\Route;
use App\Models\Qualifiers\Media;

Route::get('/', function () {
    $media = new Media();
    $slug = $media->streams()->first()->slug;

    return redirect('/filmes/' . $slug);
});

Route::get('/filmes/{channel}', function ($channel) {
    $table = 'movies';
    $header = 'Filmes';

    $c_media = new Media();
    $media = $c_media->streams();
    $subheader = $c_media->where('slug', $channel)->first()->name;

    return view('titles', compact('table', 'header', 'subheader', 'media'));
});

Route::get('/series/{channel}', function ($channel) {
    $table = 'series';
    $header = 'Séries';

    $c_media = new Media();
    $media = $c_media->streams();
    $subheader = $c_media->where('slug', $channel)->first()->name;

    return view('titles', compact('table', 'header', 'subheader', 'media'));
});

Auth::routes();
