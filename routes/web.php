<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

/*

*/

Route::view('/', 'home');
Route::view('contact', 'contact');
Route::view('about', 'about');

Route::get('customer', [CustomerController::class, 'list']);

Route::post('customer', [CustomerController::class, 'store']);
