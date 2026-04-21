<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/docs-id', function () {
    return view()->file(resource_path('views/scribe/index.id.blade.php'));
});

Route::get('/docs-en', function () {
    return view()->file(resource_path('views/scribe/index.en.blade.php'));
});
