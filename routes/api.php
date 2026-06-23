<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TugasApiController;

Route::get('/test', function () {
    return response()->json([
        'status' => true,
        'message' => 'API Berjalan'
    ]);
});

Route::get('/tugas', [TugasApiController::class, 'index']);