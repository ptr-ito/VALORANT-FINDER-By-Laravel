<?php

declare(strict_types=1);

use App\Http\Controllers\MatchPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/currentUser', function (Request $request) {
    return $request->user();
});

Route::apiResource('/match_posts', MatchPostController::class)
    ->only(['index']);

Route::apiResource('/match_post', MatchPostController::class)
->only(['show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/match_post', MatchPostController::class)
        ->only(['store', 'update', 'destroy']);
});
