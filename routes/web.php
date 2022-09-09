<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// HOME
Route::get('/', function () {
    return view('welcome');
});

// CAMBIO DE IDIOMA
Route::get('/lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});

// RUTAS BÁSICAS
Route::get('/{section}', function ($section) {
    return view(strtolower(trim($section)));
});