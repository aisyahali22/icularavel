<?php

use App\Http\Controllers\FeedController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
  
    route::get('/feeds',[FeedController::class, 'index'])->name('feeds');

    route::get('/feed/create',[FeedController::class, 'create'])->name('feed.create');
    route::post('/feed/store',[FeedController::class, 'store'])->name('feed.store');

    route::get('/feed/show/{feed}',[FeedController::class, 'show'])->name('feed.show');
    route::put('/feed/update/{feed}',[FeedController::class, 'update'])->name('feed.update');

});




