<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    //return view('welcome');
});
Auth::routes();
//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
