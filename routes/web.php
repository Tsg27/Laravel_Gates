<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

//-------------Config páge Home------------------->
Route::get('/', [Controller::class, 'home'])->name('home');


//-------------LoginController------------------->
Route::get('/login', [LoginController::class, 'login'])->name('login');    
Route::post('/auth', [LoginController::class, 'auth'])->name('auth-user');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Grupo de rotas protegidas pelo middleware de autenticação
    Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/index', [PostController::class, 'index'])->name('index');
    
    // Chamada de views:
    Route::get('/create', [PostController::class, 'view_create'])->name('create.view');
    Route::get('/profile', [UserController::class, 'view_Profile'])->name('profile.view');


    // Crud post
    Route::post('/index', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::patch('/profile/{user}', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.delete');


    // Rotas para views Users:
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('users.toggleAdmin');
});



//----------Tratar erro de página não encontrada com URL amigavél------------>
Route::fallback(function () {
    return view('error.404');
});
