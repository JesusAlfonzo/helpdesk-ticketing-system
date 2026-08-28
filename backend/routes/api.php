<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tickets', [
    TicketController::class,
    'index'
]);

Route::post('/tickets', [
    TicketController::class,
    'store'
]);

Route::get('/technicians', [
    UserController::class,
    'index'
]);

Route::patch('/tickets/{ticket}/assign', [
    TicketController::class,
    'assignTicket'
]);

Route::patch('/tickets/{ticket}/status', [
    TicketController::class,
    'updateStatus'
]);