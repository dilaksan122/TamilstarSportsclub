<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ClubInfoController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthCoontroller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MatchFeatureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FounderController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\VideoController;

// Applying middleware to a group of routes
Route::middleware(['admin_auth', 'prevent-back-history'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
    Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create');
    Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
    Route::get('/players/{player}', [PlayerController::class, 'show'])->name('players.show');
    Route::get('/players/{player}/edit', [PlayerController::class, 'edit'])->name('players.edit');
    Route::put('/players/{player}', [PlayerController::class, 'update'])->name('players.update');
    Route::delete('/players/{player}', [PlayerController::class, 'destroy'])->name('players.destroy');

    Route::get('news', [NewsController::class, 'index'])->name('news.index');
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('news', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::get('news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::get('/match-features', [MatchFeatureController::class, 'index'])->name('match-features.index');
    Route::get('/match-features/create', [MatchFeatureController::class, 'create'])->name('match-features.create');
    Route::post('/match-features', [MatchFeatureController::class, 'store'])->name('match-features.store');
    Route::get('/match-features/{id}', [MatchFeatureController::class, 'show'])->name('match-features.show');
    Route::get('/match-features/{id}/edit', [MatchFeatureController::class, 'edit'])->name('match-features.edit');
    Route::put('/match-features/{id}', [MatchFeatureController::class, 'update'])->name('match-features.update');
    Route::delete('/match-features/{id}', [MatchFeatureController::class, 'destroy'])->name('match-features.destroy');

    Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
    Route::get('/galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
    Route::post('/galleries', [GalleryController::class, 'store'])->name('galleries.store');
    Route::get('/galleries/{id}', [GalleryController::class, 'show'])->name('galleries.show');
    Route::get('/galleries/{id}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
    Route::put('/galleries/{id}', [GalleryController::class, 'update'])->name('galleries.update');
    Route::delete('/galleries/{id}', [GalleryController::class, 'destroy'])->name('galleries.destroy');

    Route::get('about-us', [AboutUsController::class, 'index'])->name('aboutUs.index');
    Route::get('/about-us/create', [AboutUsController::class, 'create'])->name('aboutUs.create');
    Route::post('about-us', [AboutUsController::class, 'store'])->name('aboutUs.store');
    Route::get('about-us/{id}', [AboutUsController::class, 'show'])->name('aboutUs.show');
    Route::get('/about-us/{id}/edit', [AboutUsController::class, 'edit'])->name('aboutUs.edit');
    Route::put('about-us/{id}', [AboutUsController::class, 'update'])->name('aboutUs.update');
    Route::delete('about-us/{id}', [AboutUsController::class, 'destroy'])->name('aboutUs.destroy');

    Route::get('/founders', [FounderController::class, 'index'])->name('founders.index');
    Route::get('/founders/create', [FounderController::class, 'create'])->name('founders.create');
    Route::post('/founders', [FounderController::class, 'store'])->name('founders.store');
    Route::get('/founders/{founder}', [FounderController::class, 'show'])->name('founders.show');
    Route::get('/founders/{founder}/edit', [FounderController::class, 'edit'])->name('founders.edit');
    Route::put('/founders/{founder}', [FounderController::class, 'update'])->name('founders.update');
    Route::delete('/founders/{founder}', [FounderController::class, 'destroy'])->name('founders.destroy');

    Route::get('videos', [VideoController::class, 'index'])->name('videos.index');
    Route::get('videos/create', [VideoController::class, 'create'])->name('videos.create');
    Route::post('videos', [VideoController::class, 'store'])->name('videos.store');
    Route::get('videos/{video}', [VideoController::class, 'show'])->name('videos.show');
    Route::delete('videos/{video}', [VideoController::class, 'destroy'])->name('videos.destroy');
    
    Route::get('admin/club_info', [ClubInfoController::class, 'index'])->name('admin.club_info.index');
    Route::get('admin/club_info/create', [ClubInfoController::class, 'create'])->name('admin.club_info.create');
    Route::post('admin/club_info', [ClubInfoController::class, 'store'])->name('admin.club_info.store');
    Route::get('admin/club_info/{clubInfo}/edit', [ClubInfoController::class, 'edit'])->name('admin.club_info.edit');
    Route::put('admin/club_info/{clubInfo}', [ClubInfoController::class, 'update'])->name('admin.club_info.update');
    Route::delete('admin/club_info/{clubInfo}', [ClubInfoController::class, 'destroy'])->name('admin.club_info.destroy');
    

    // routes/web.php
Route::get('/admin/comments', [CommentController::class, 'view'])->name('admin.comments.index');


Route::get('/admin/logout',[AuthCoontroller::class,'AdminLogout'])->name('admin.logout');
});




Route::get('/',[AuthCoontroller::class,'index'])->name('getLogin');
 Route::post('/',[AuthCoontroller::class,'postlogin'])->name('postlogin');
