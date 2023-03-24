<?php

use App\Models\Menu;
use App\Models\Categories;
use App\Models\Reservering;
use Illuminate\Http\Request;
use App\Mail\ReserveringAnnulatie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReserveringController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');


    // Contactpagina
    Route::get('/contact', function () {
        return view('contact', [
            'title' => 'Contact'
        ]);
    });

    //Vacaturepagina
    Route::get('/vacatures', function () {
        return view('vacatures', [
            'title' => 'Vacatures'
        ]);
    });

    // Menupagina
    Route::get('/menu', function () {
        return view('menu', ['menu' => Menu::all(), 'categorieen' => Categories::all()]);
    });

    Route::get('/', function () {
        return view('home');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');




    // Menu-item toevoegen
    Route::get('/menu/toevoegen', [MenuController::class, 'add']);

    Route::post('/menu/toegevoegd', [MenuController::class, 'store']);

    // Menu-item selecteren
    Route::get('/menu/bewerken',  function () {
        return view('menu_bewerken', [
            'menu' => Menu::all(),
            'categorieen' => Categories::all()
        ]);
    });

    // Menu-item bewerken
    Route::get('/menu/bewerken/{id}',  [MenuController::class, 'edit']);

    // Bewerking submit menu-item
    Route::put('menu/bewerken/{id}/bewerkt', [MenuController::class, 'update']);

    // Verwijder gerecht
    Route::delete('menu/verwijderen/{id}', [MenuController::class, 'destroy']);

    // Bekijk specifieke reservering
    Route::get('/reservering/{id}', [ReserveringController::class, 'edit']);

    // RESERVERINGEN
    Route::get('/reserveringen', [ReserveringController::class, 'index']);

    // RESERVERINGEN ZOEKEN
    Route::get('/reserveringen/zoeken', function () {
        return view('reservering_zoeken');
    });

    // Verwijzen naar juiste reservering
    Route::post('/reserveringen/gezocht', [ReserveringController::class, 'search']);

    // Verwijzen naar juiste reservering
    Route::put('/reservering/bewerkt/{id}', [ReserveringController::class, 'update']);

    // Reserveringen
    Route::delete('/reservering/verwijderen/{id}', [ReserveringController::class, 'destroy']);
});
