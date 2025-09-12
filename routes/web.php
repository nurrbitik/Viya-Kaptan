<?php
use Illuminate\Support\Facades\Route;
Route::get('/ping', fn () => 'pong');
Route::get('/admin-test', fn()=> 'ok');
