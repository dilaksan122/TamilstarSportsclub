<?php

use App\Http\Controllers\ClubInfoApiController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventApiController;
use App\Http\Controllers\FounderApiController;
use App\Http\Controllers\GalleryApiController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PlayerApiControllers;
use App\Http\Controllers\VideoApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('api/players',[PlayerApiControllers::class,'index']);
Route::get('api/news',[PlayerApiControllers::class,'newsindex']);
Route::get('api/news/{id}',[PlayerApiControllers::class,'newsview']);



Route::get('/api/about-us', [EventApiController::class, 'showAbout']);


Route::post('/contact', [ContactController::class, 'send']);


    Route::post('news/{newsId}/comments', [CommentController::class, 'store']);
    Route::get('news/{newsId}/comments', [CommentController::class, 'index']);

Route::get('galleries/show',[GalleryApiController::class,'show']);

Route::get('clubinfo/show',[ClubInfoApiController::class,'show']);


Route::get('founder',[FounderApiController::class,'index']);

Route::get('viewVideo',[VideoApiController::class,'view']);

// Event API Routes
Route::get('/api/events', [EventApiController::class, 'getAllEvents']);
Route::get('/api/events/{id}', [EventApiController::class, 'getEventWithMatches']);

// Match Feature API Routes
Route::get('/api/match-features', [EventApiController::class, 'getAllMatchFeatures']);
Route::get('/api/match-features/{eventId}', [EventApiController::class, 'getMatchesByEvent']);