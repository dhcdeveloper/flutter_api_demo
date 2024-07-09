<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\PriorityIntroducerController;
// use App

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function(){
    return view('hello');
});

// Route::get('/priorityintroducer',[PriorityIntroducerController::class, 'index']);
// Route::get('/priorityintroducer/edit',[PriorityIntroducerController::class, 'edit']);