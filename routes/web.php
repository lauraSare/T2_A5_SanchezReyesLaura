<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function() {
        return redirect('/alumnos');
    })->name('home');
    
    Route::resource('alumnos', AlumnoController::class);
});