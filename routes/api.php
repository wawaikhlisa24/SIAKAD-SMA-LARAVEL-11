<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubjectController;

// Endpoint untuk mendapatkan daftar subjek
Route::get('/subjects', [SubjectController::class, 'index']);

// Endpoint lain yang mungkin Anda butuhkan untuk operasi CRUD
Route::post('/subjects', [SubjectController::class, 'store']);
Route::get('/subjects/{id}', [SubjectController::class, 'show']);
Route::put('/subjects/{id}', [SubjectController::class, 'update']);
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy']);

// Middleware untuk otentikasi, contoh endpoint untuk mendapatkan user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
