<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

// PERSONS
Route::get('/data/persons/', [Controllers\PersonsController::class, 'index']);
Route::get('/data/persons/delete/{id}', [Controllers\PersonsController::class, 'delete']);
Route::post('/data/persons/edit', [Controllers\PersonsController::class, 'edit']);
Route::post('/data/persons/new', [Controllers\PersonsController::class, 'new']);

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

Route::get('/login', [Controllers\LoginController::class, 'index']);
Route::post('/login', [Controllers\LoginController::class, 'login']);
Route::get('/logout', [Controllers\LoginController::class, 'logout']);

Route::get('/messages', function () {
    return view('messages');
});

// Recommendations
Route::get('/recommendations/', [Controllers\RecommendationsController::class, 'index']);
Route::get('/recommendations/delete/{id}', [Controllers\RecommendationsController::class, 'delete']);
Route::post('/recommendations/edit', [Controllers\RecommendationsController::class, 'edit']);
Route::post('/recommendations/new', [Controllers\RecommendationsController::class, 'new']);

Route::get('/symptomTracking', [Controllers\SymptomTrackingController::class, 'index']);
Route::post('/symptomTracking', [Controllers\SymptomTrackingController::class, 'submit']);