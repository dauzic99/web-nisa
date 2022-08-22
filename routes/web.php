<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IkmController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RespondentController;
use App\Http\Controllers\PeriodController;

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

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/kuesioner', [LandingController::class, 'kuesioner'])->name('kuesioner');
Route::get('/kuesioner/download', [LandingController::class, 'kuesioner_download'])->name('kuesioner.download');
// Route::get('/ikm', [LandingController::class, 'ikm_index'])->name('ikm.index');
// Route::post('/ikm/response', [LandingController::class, 'ikm_response'])->name('ikm.response');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::post('/dashboard/loaddatas', [DashboardController::class, 'loaddatas'])->middleware(['auth'])->name('dashboard.loaddatas');

    Route::prefix('admin')->group(function () {

        Route::resource('user', UserController::class);
        Route::resource('service', ServiceController::class);
        Route::resource('period', PeriodController::class);
        Route::get('period/activate/{period}', [PeriodController::class, 'activate'])->name('period.activate');
        Route::get('period/deactivate/{period}', [PeriodController::class, 'deactivate'])->name('period.deactivate');
        Route::resource('question', QuestionController::class);

        Route::prefix('profile')->group(function () {
            Route::get('/edit/{user}', [UserController::class, 'editProfile'])->name('profile.edit');
            Route::put('/edit/{user}', [UserController::class, 'updateProfile'])->name('profile.update');
            Route::get('/show', [UserController::class, 'profile'])->name('profile.show');
        });
        Route::get('respondent', [RespondentController::class, 'index'])->name('report.respondent');
        Route::post('respondent/loaddatas', [RespondentController::class, 'loaddatas'])->name('report.respondent.loaddatas');
        Route::delete('respondent/{respondent}', [RespondentController::class, 'destroy'])->name('report.respondent.destroy');
        Route::get('response/all-print', [RespondentController::class, 'printAllResponse'])->name('report.response.all-print');
        Route::get('response/{respondent}', [RespondentController::class, 'showResponse'])->name('report.response');
        Route::get('response/{respondent}/print', [RespondentController::class, 'printResponse'])->name('report.response.print');

        Route::get('ikm', [IkmController::class, 'index'])->name('admin.ikm.index');
        Route::post('ikm/loaddatas', [IkmController::class, 'loaddatas'])->name('admin.ikm.loaddatas');
    });
});

require __DIR__ . '/auth.php';
