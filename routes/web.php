<?php

use Illuminate\Support\Facades\Route;

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

Route::inertia('/', 'Index');
Route::inertia('/example-form', 'ExampleForm');
Route::post('/store', function() {
  request()->validate([
    'email' => ['required', 'min:10', 'email'],
  ]);
  sleep(2);
  return redirect('/example-form');
});
