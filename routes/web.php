<?php

use App\Http\Controllers\ReservasController;
use App\Models\Reserva;
use App\Http\Controllers\Admin\RecursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Notifications\reservationMade;
use \App\Models\Recurso;

Route::middleware([AdminMiddleware::class, 'auth'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index']);
    Route::delete('/admin/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete']);
    Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'create']);
    Route::post('/admin/store', [App\Http\Controllers\AdminController::class, 'store']);
    Route::get('/admin/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit']);
    Route::put('/admin/update/{id}', [App\Http\Controllers\AdminController::class, 'update']);
});
Route::get('/', [ReservasController::class, 'index']);

Route::get('/recursos', [ReservasController::class, 'recursos']);


Route::get('/dashboard', [ReservasController::class, 'dashboard'])->middleware('auth');

Route::post('/recursos/reservas/{id}', [ReservasController::class, 'reservar'])->middleware('auth');

Route::delete('/recursos/cancelar/{id}', [ReservasController::class, 'cancelar'])->middleware('auth');

Route::get('/recursos/more/{id}', [ReservasController::class, 'more']);
