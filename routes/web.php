<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/home', function(){
    return view('home', ['name'=>"team"]);
})->name('home');

route::get('/about', function(){
    return view('about', ['name'=>"team"]);
})->name('about');

route::get('/home/{name}', function($name){
    return view('home',['name'=>$name]);
});

route::get('/auth/signIn', function(){
    return view('auth.signin');
});

route::get('/user/profile', function(){
    return 'Peengguna baru perlu mendaftar';
})->name('user.profile');

//route param
route::get('/user/{name}', function($name){
return 'User berdaftar '.$name;
});

route::get('/user/{name}/{age}', function($name, $age){
    return 'User '.$name. 'age '.$age;
});



//redirect route to named route
route::get('/redirect-to-profile', function(){
return redirect()->route('user.profile');
});

route::prefix('food')->group(function(){
    route::get('/details', function(){
        return 'Food details are following';
    });
    route::get('/home2', function(){
        return 'Food home page';
    });
});

route::name('job')->prefix('job')->group(function(){
    route::get('/home', function(){
        return 'Job home page';
    })->name('.home');

    route::get('/description', function(){
        return 'Job details are following';
    })->name('.description');
});

// route::get('/feeds', function(){
//     return view('pages/feed/index');
//   })->name('feeds');
require __DIR__.'/feed/web.php';

// route::get('/auth/signup',[AuthController::class, 'signUp'])->name('auth.signup');
// route::get('/auth/signin',[AuthController::class, 'signIn'])->name('auth.signin');

Route::middleware('guest')->group(function(){
    Route::get('/auth/signup', [AuthController::class, 'signUp'])->name('auth.signup');
    Route::get('/auth/signin', [AuthController::class, 'signIn'])->name('auth.signin');
    Route::post('/auth/store', [AuthController::class, 'storeUser'])->name('auth.store');
    Route::post('/auth/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    
    });
    
    Route::get('/auth/signOut', [AuthController::class, 'signOut'])->name('auth.signOut');
