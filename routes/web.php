<?php

use App\Http\Controllers\Control;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\SendPerson;
use App\Http\Controllers\WallController;
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

Route::get('/', WallController::class)->name('wall');
Route::get('/person/{person}', PersonController::class)->name('person');
Route::get('/send-person', SendPerson\ShowController::class)->name('send-person.show');
Route::post('/send-person', SendPerson\SendController::class)->name('send-person.send');

Route::prefix('/control')->name('control.')->group(function () {
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::get('login', Control\Auth\ShowController::class)->name('show');
        Route::post('login', Control\Auth\LoginController::class)->name('login');
        Route::post('logout', Control\Auth\LogoutController::class)->name('logout');
    });

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', Control\DashboardController::class)->name('dashboard');

        Route::prefix('persons')->name('persons.')->group(function () {
            Route::get('', Control\Persons\ListController::class)->name('list');
            Route::get('create', Control\Persons\EditController::class)->name('create');
            Route::post('save', Control\Persons\SaveController::class)->name('save');
            Route::get('{person}/edit', Control\Persons\EditController::class)->name('edit');
            Route::post('{person}/update', Control\Persons\SaveController::class)->name('update');
            Route::post('{person}/accept', Control\Persons\AcceptController::class)->name('accept');
            Route::post('{person}/reject', Control\Persons\RejectController::class)->name('reject');
            Route::post('{person}/wait', Control\Persons\WaitController::class)->name('wait');
            Route::post('{person}/remove', Control\Persons\RemoveController::class)
                 ->name('remove')->middleware('can:delete,person');
        });

        Route::prefix('photos')->name('photos.')->group(function () {
            Route::post('upload/{person}', Control\Photos\UploadController::class)->name('upload');
            Route::post('remove/{photo}', Control\Photos\RemoveController::class)->name('remove');
        });

        Route::prefix('users')
             ->name('users.')
             ->middleware('can:viewAny,\App\Models\User')
             ->group(function () {
                 Route::get('', Control\Users\ListController::class)->name('list');
                 Route::get('create', Control\Users\EditController::class)->name('create');
                 Route::post('save', Control\Users\SaveController::class)->name('save');
                 Route::get('{user}/edit', Control\Users\EditController::class)->name('edit');
                 Route::post('{user}/update', Control\Users\SaveController::class)->name('update');
                 Route::post('{user}/remove', Control\Users\RemoveController::class)->name('remove');
             });

        Route::prefix('tags')
             ->name('tags.')
             ->middleware('can:viewAny,\App\Models\Tag')
             ->group(function () {
                 Route::get('', Control\Tags\ListController::class)->name('list');
                 Route::get('create', Control\Tags\EditController::class)->name('create');
                 Route::post('save', Control\Tags\SaveController::class)->name('save');
                 Route::get('{tag}/edit', Control\Tags\EditController::class)->name('edit');
                 Route::post('{tag}/update', Control\Tags\SaveController::class)->name('update');
                 Route::post('{tag}/remove', Control\Tags\RemoveController::class)->name('remove');
             });
    });
});
