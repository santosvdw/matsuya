<?php

use App\Models\Menu;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Mail\ReserveringBewerkt;
use App\Mail\ReserveringAnnulatie;
use App\Mail\ReserveringConfirmatie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReserveringController;

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

// Route::get('/hi', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Homepagina
Route::get('/', function () {
    return view('home');
});

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

// Verzend reservering
Route::post('/reserveren', [ReserveringController::class, 'store']);

Route::get('/storage/fotos/{filename}', function ($filename) {
    return file('../storage/app/public/fotos/' . $filename);
});
