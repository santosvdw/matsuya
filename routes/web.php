<?php

use App\Models\Menu;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;
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

// // Menu-item toevoegen
// Route::get('/menu/toevoegen', [MenuController::class, 'add']);

// Route::post('/menu/toegevoegd', [MenuController::class, 'store']);

// // Menu-item selecteren
// Route::get('/menu/bewerken',  function () {
//     return view('menu_bewerken', [
//         'menu' => Menu::all(),
//         'categorieen' => Categories::all()
//     ]);
// });

// // Menu-item bewerken
// Route::get('/menu/bewerken/{id}',  [MenuController::class, 'edit']);

// // Bewerking submit menu-item
// Route::put('menu/bewerken/{id}/bewerkt', [MenuController::class, 'update']);

// // Verwijder gerecht
// Route::delete('menu/verwijderen/{id}', [MenuController::class, 'destroy']);

// // RESERVERINGEN
// Route::get('/reserveringen', [ReserveringController::class, 'index']);

// // Verzend reservering
// Route::post('/reserveren', [ReserveringController::class, 'store']);
