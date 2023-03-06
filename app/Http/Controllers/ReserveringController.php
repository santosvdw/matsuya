<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Reservering;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReserveringController extends Controller
{
    // Show alle reserveringen
    public function index()
    {
        $today = Carbon::now()->toDateString();
        $reserv_vndg = Reservering::orderBy('tijd', 'ASC')
            ->where('datum', '=', $today)
            ->get();

        $verlopen_reserv = Reservering::whereTime('tijd', '<', Carbon::now()->subMinutes(45))->orderBy('tijd', 'ASC')->where('datum', '=', $today)->get();
        $huidig_reserv = Reservering::whereBetween('tijd', [Carbon::now()->subMinutes(45), Carbon::now()->addMinutes(45)])->orderBy('tijd', 'ASC')->where('datum', '=', $today)->get();
        $toekomstig_reserv = Reservering::whereTime('tijd', '>', Carbon::now()->addMinutes(45))->orderBy('tijd', 'ASC')->where('datum', '=', $today)->get();


        // dd($reserv_vndg);
        return view('reserveringen', [
            'reserveringen' => $reserv_vndg,
            'verlopen' => $verlopen_reserv,
            'huidig' => $huidig_reserv,
            'toekomstig' => $toekomstig_reserv,
        ]);
    }

    // Store data
    public function store(Request $request)
    {
        Reservering::create([
            'voornaam' => implode($request->all('voornaam')),
            'achternaam' => implode($request->all('achternaam')),
            'email' => implode($request->all('email')),
            'telefoon' => implode($request->all('telefoon')),
            'datum' => implode($request->all('datum')),
            'tijd' => implode($request->all('tijd')),
            'aant_personen' => implode($request->all('aant_personen'))
        ]);

        return redirect('/#reserveren')->with('status', 'Uw reservering is opgeslagen!');
    }
}


  // $formFields = $request->validate([
        //     'voornaam' => 'required',
        //     'achternaam' => 'required',
        //     'email' => 'required',
        //     'telefoon' => 'required',
        //     'datum' => 'required',
        //     'tijd' => 'required',
        //     'aant_personen' => 'required',
        // ]);