<?php

use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitAnalysisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/types', [TypeController::class, 'index']);
Route::post('/unit-of-analyses', [UnitAnalysisController::class, 'store'])->name('unit.store');
Route::post('/submissions', [SubmissionController::class, 'store'])->name('submission.store');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
