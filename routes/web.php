<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    $projects = \App\Models\Project::orderBy('order')->get();
    return view('welcome', compact('projects'));
});

Route::get('/cv', function () {
    $pdfPath = public_path('CV_Valdric.pdf');
    if (file_exists($pdfPath)) {
        return response()->download($pdfPath, 'CV_Valdric_Abirama_Pranaja_Dandi.pdf');
    }
    $projects = \App\Models\Project::orderBy('order')->get();
    return view('cv', compact('projects'));
});

Route::post('/api/chat', [ChatController::class, 'chat']);


