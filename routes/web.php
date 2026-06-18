<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projects = \App\Models\Project::orderBy('order')->get();
    return view('welcome', compact('projects'));
});

Route::get('/cv', function () {
    $projects = \App\Models\Project::orderBy('order')->get();
    return view('cv', compact('projects'));
});
