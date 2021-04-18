<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// CRUD API views
Route::get('/data/facilities', function () {
    return view('/data/facilities');
});

Route::get('/data/groupzones', function () {
    return view('/data/groupzones');
});

Route::get('/data/persons', function () {
    return view('/data/persons');
});

Route::get('/data/publichealthworkers', function () {
    return view('/data/publichealthworkers');
});

Route::get('/data/regions', function () {
    return view('/data/regions');
});

// Main Views
Route::get('/', function () {
    return view('welcome');
});

Route::get('/debug', function () {
    return view('debug');
});

Route::get('/form', function () {
    return view('form');
});

Route::post('/login', function () {
    return view('login');
});

Route::get('/messages', function () {
    return view('messages');
});

Route::get('/recommendations', function () {
    return view('recommendations');
});