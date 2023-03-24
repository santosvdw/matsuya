<?php

use Carbon\Carbon;
use App\Models\Reservering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/aantal_klanten', function () {
    return response()->json([
        'aantal_reserveringen' => Reservering::all()->count(),
        'totaal_personen' => Reservering::all()->sum('aant_personen'),
        'gemiddeld_reserveringen_per_maand' => Reservering::all()->count() / Carbon::createFromDate("2023-03-03 00:00:00")->diffInDays(Carbon::now()) * 30,
        'gemiddeld_personen_per_maand' => Reservering::all()->sum('aant_personen') / Carbon::createFromDate("2023-03-03 00:00:00")->diffInDays(Carbon::now()) * 30,
        'aantal_dagen_online' => Carbon::createFromDate("2023-03-03 00:00:00")->diffInDays(Carbon::now())
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// SELECT tijd, count(*) FROM `reserverings` GROUP BY tijd;


Route::get('/tafels_beschikbaar', function () {
    $tafels = DB::table("reserverings")
        ->selectRaw("tijd, datum, count(*) AS 'bezet'")
        ->groupBy("tijd", "datum")
        ->get();
    return response()->json([
        'tafels' => $tafels
    ]);
});
