<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    $projects = \App\Models\Project::orderBy('order')->get();
    return view('welcome', compact('projects'));
});

Route::get('/cv', function () {
    $projects = \App\Models\Project::orderBy('order')->get();
    return view('cv', compact('projects'));
});

Route::get('/library', function () {
    return view('library');
});

Route::post('/api/chat', [ChatController::class, 'chat']);

