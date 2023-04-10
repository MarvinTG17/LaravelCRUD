<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});

/* Route::get('/dash/crud', function () {
    return view('crud.index');
}); 
 */
Route::resource('/dash/crud', ClienteController::class);

/* Route::get('/dash/crud/create', function () {
    return view('crud.create');
}); */


