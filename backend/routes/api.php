<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); // Obtener el usuario autenticado

Route::post('/login', [AuthController::class, 'login'])->name('login'); // Ruta para el login
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tickets', [TicketController::class, 'index']); // Listar todos los tickets
    Route::post('/tickets', [TicketController::class, 'store']); // Crear un nuevo ticket
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy']); // Eliminar un ticket
    Route::get('/technicians', [UserController::class, 'index']); // Listar todos los técnicos
    Route::patch('/tickets/{ticket}/assign', [TicketController::class, 'assignTicket']); // Asignar un ticket a un técnico
    Route::patch('/tickets/{ticket}/status', [TicketController::class, 'updateStatus']); // Actualizar el estado de un ticket
    Route::post('/logout', [AuthController::class, 'logout']); // Ruta para el logout
});
