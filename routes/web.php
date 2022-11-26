<?php

use Illuminate\Support\Facades\Route;

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

Route::get('', \App\Http\Livewire\Pages\Index::class)->name('pages.index');

Route::get('collections', \App\Http\Livewire\Collections\Index::class)->name('collections.index');
Route::get('collections/create', \App\Http\Livewire\Collections\Create::class)->name('collections.create');
Route::get('collections/{collection}/edit', \App\Http\Livewire\Collections\Edit::class)->name('collections.edit');

Route::get('{collection}', \App\Http\Livewire\Entities\Index::class)->name('entities.index');
Route::get('{collection}/create', \App\Http\Livewire\Entities\Create::class)->name('entities.create');
Route::get('{collection}/entity/{entity}', \App\Http\Livewire\Entities\Show::class)->name('entities.show');
