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

// Public health centres
Route::get('/data/publichealthcentres/', [Controllers\PublicHealthCentresController::class, 'index']);
Route::get('/data/publichealthcentres/delete/{id}', [Controllers\PublicHealthCentresController::class, 'delete']);
Route::post('/data/publichealthcentres/edit', [Controllers\PublicHealthCentresController::class, 'edit']);
Route::post('/data/publichealthcentres/new', [Controllers\PublicHealthCentresController::class, 'new']);

// Group zones
Route::get('/data/groupzones/', [Controllers\GroupZonesController::class, 'index']);
Route::get('/data/groupzones/delete/{id}', [Controllers\GroupZonesController::class, 'delete']);
Route::post('/data/groupzones/edit', [Controllers\GroupZonesController::class, 'edit']);
Route::post('/data/groupzones/new', [Controllers\GroupZonesController::class, 'new']);

// Persons
Route::get('/data/persons/', [Controllers\PersonsController::class, 'index']);
Route::get('/data/persons/delete/{id}', [Controllers\PersonsController::class, 'delete']);
Route::post('/data/persons/edit', [Controllers\PersonsController::class, 'edit']);
Route::post('/data/persons/new', [Controllers\PersonsController::class, 'new']);

// Public Health Workers
Route::get('/data/publichealthworkers/', [Controllers\PublicHealthWorkersController::class, 'index']);
Route::get('/data/publichealthworkers/delete/{id}', [Controllers\PublicHealthWorkersController::class, 'delete']);
Route::post('/data/publichealthworkers/edit', [Controllers\PublicHealthWorkersController::class, 'edit']);
Route::post('/data/publichealthworkers/new', [Controllers\PublicHealthWorkersController::class, 'new']);

// Regions
Route::get('/data/regions/', [Controllers\RegionsController::class, 'index']);
Route::get('/data/regions/delete/{id}', [Controllers\RegionsController::class, 'delete']);
Route::post('/data/regions/edit', [Controllers\RegionsController::class, 'edit']);
Route::post('/data/regions/new', [Controllers\RegionsController::class, 'new']);

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

Route::get('/messages', [Controllers\MessagesController::class, 'index']);
Route::get('/messages/view/{id}', [Controllers\MessagesController::class, 'view']);
Route::get('/messages/delete/{id}', [Controllers\MessagesController::class, 'delete']);

// Recommendations
Route::get('/recommendations/', [Controllers\RecommendationsController::class, 'index']);
Route::get('/recommendations/delete/{id}', [Controllers\RecommendationsController::class, 'delete']);
Route::post('/recommendations/edit', [Controllers\RecommendationsController::class, 'edit']);
Route::post('/recommendations/new', [Controllers\RecommendationsController::class, 'new']);

Route::get('/symptomTracking', [Controllers\SymptomTrackingController::class, 'index']);
Route::post('/symptomTracking', [Controllers\SymptomTrackingController::class, 'submit']);

// Reports
Route::get('/symptomHistory', [Controllers\ReportsController::class, 'historyIndex']);
Route::post('/symptomHistory', [Controllers\ReportsController::class, 'historyGet']);

Route::get('/pcrEntry/', [Controllers\PcrTestController::class, 'index']);
Route::post('/pcrEntry/', [Controllers\PcrTestController::class, 'submit']);
