<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IconController;

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

Route::get('/', [IdeaController::class, 'index'])->name('idea.index');

Route::get('/idea/{idea:slug}', [IdeaController::class, 'show'])->name('idea.show');

Route::get('/icon/{id}', [IconController::class, 'getIcon'])->name('idea.geticon');

Route::get('/forum', function () {
    return view('forum');
});




require __DIR__.'/auth.php';
