<?php
Route::post('/login', [AutenticacaoController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AutenticacaoController::class, 'logout']);
    Route::get('/me', [AutenticacaoController::class, 'me']);

    Route::get('/conteudos', [ConteudoController::class, 'index']);
    Route::get('/areas', [AreaController::class, 'index']);
});
