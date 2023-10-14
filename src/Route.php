<?php
use Illuminate\Support\Facades\Route;
use Zems\ZemsAuth\AuthController;


Route::get('/login', function () {
    $zemsWeb = new AuthController;
    return $zemsWeb->index();
});