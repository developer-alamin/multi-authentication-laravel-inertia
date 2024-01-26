<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get("/check",[HomeController::class,"checkPage"])->name("check.page");

Route::middleware(["auth","users"])->group(function () {

});
Route::group(['middleware'=>['auth','users','verified']],function(){
    Route::prefix("/users")->group(function(){
        Route::get("/home",[HomeController::class,"dashboard"])->name("dashboard");
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::group(['middleware'=>['auth','admin','verified']],function(){
    Route::prefix("/admin")->group(function(){
        Route::get("/home",[HomeController::class,"adminPage"])->name("admin.home");
    });
});

require __DIR__.'/auth.php';
