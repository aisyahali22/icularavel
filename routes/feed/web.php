<?php

use App\Http\Controllers\FeedController;
use Illuminate\Support\Facades\Route;


route::get('/feeds',[FeedController::class, 'index'])->name('feeds');
route::post('/feed/create',[FeedController::class, 'create'])->name('feed.create');
route::put('/feed/update/{feed}',[FeedController::class, 'update'])->name('feed.update');
route::get('/feed/show/{feed}',[FeedController::class, 'show'])->name('feed.show');





