<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;





Route::get('/events', [EventController::class, 'index'])
    ->name('events.index');
Route::get('/events/events', [EventController::class, 'events'])
    ->name('events.events');
Route::get('/events/workshop', [EventController::class, 'workshops'])
    ->name('events.workshop');
Route::get('/events/create', [EventController::class, 'create'])
    ->name('events.create')->middleware('auth');
Route::post('/events/store', [EventController::class, 'store'])
    ->name('events.store');

Route::get('/events/event/{event}', [EventController::class, 'show'])
    ->name('events.show');

Route::post('/events/{event}/signup', [EventController::class, 'signup'])
    ->name('events.signup');






Route::get('/', function () {
    return view('events.index');
});



Route::get('/admin', function () {
    return view('events.index');
})->middleware(['auth', 'verified'])->name('admin');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('events', [\App\Http\Controllers\Admin\EventController::class, 'index'])->name('events.index'); // admin.index;
    Route::get('events/{event}', [\App\Http\Controllers\Admin\EventController::class, 'show'])->name('events.show');
    Route::get('events/{event}/edit', [\App\Http\Controllers\Admin\EventController::class, 'edit'])->name('events.edit');
    Route::patch('events/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update'])->name('events.update');
  Route::get('events/delete/{id}',[\App\Http\Controllers\Admin\EventController::class,'delete'])->name('events.delete');
    Route::post('events/{event},', [\App\Http\Controllers\Admin\EventController::class, 'store'])->name('events.store');

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
