<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//gli diciamo che le rotte di amministrazione devono:
// - avere tutte il prefisso admin/ nell'url
// il nome delle rotte inizi con "admin.
//facciamo im modo che avvenga questo in automatico senza specificarlo per ogni rotta 
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);

    Route::get('/', [DashboardController::class, 'home'])->name('dashboard');

    Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);
});

Route::resource('guest/projects', HomeController::class)->parameters(['projects' => 'project:slug']);

require __DIR__.'/auth.php';
