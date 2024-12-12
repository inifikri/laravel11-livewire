<?php

use App\Livewire\Post\PostCreate;
use App\Livewire\Post\PostEdit;
use Illuminate\Support\Facades\Route;
use App\Livewire\Post\PostIndex;

Route::view('/', 'welcome');

Route::view('dashboard', 'livewire.admin.dashboard',['title' => 'Dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
// POST
Route::get('/post',PostIndex::class)
    ->middleware(['auth'])
    ->name('post.index');
Route::get('/createpost',PostCreate::class)
    ->middleware(['auth'])
    ->name('post.create');
Route::get('/edit/{id}',PostEdit::class)
    ->middleware(['auth'])
    ->name('post.edit');

require __DIR__.'/auth.php';
