<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservering;
use Illuminate\Http\Request;
use App\Mail\ReserveringAnnulatie;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\ReserveringBewerkt;
use App\Mail\ReserveringConfirmatie;
use Illuminate\Support\Facades\Mail;

class ReserveringController extends Controller
{
    // Show alle reserveringen
    public function index()
    {
        $today = Carbon::now()->toDateString();
        $reserv_vndg = Reservering::orderBy('tijd', 'ASC')
            ->where('datum', '=', $today)
            ->get();

        $time = Carbon::now()->format('H:i');


        $twelve = Carbon::createFromTime(12, 00, 00)->format('H:i'); // 12:30-15:00
        $fifteen = Carbon::createFromTime(15, 00, 00)->format('H:i'); // 15:00-17:30
        $seventeen = Carbon::createFromTime(17, 30, 00)->format('H:i'); // 17:30-20:00
        $twenty = Carbon::createFromTime(20, 00, 00)->format('H:i'); // 20:00-22:30
        $twentytwo = Carbon::createFromTime(22, 30, 00)->format('H:i'); // >22:30

        if ($time < $twelve) { //<12:30
            $toekomstig_reserv = DB::table("reserverings")
                ->where("datum", "=", $today)
                ->orderBy("tijd", "asc")
                ->get();
            $huidig_reserv = [];
            $verlopen_reserv = [];
        } else if ($time > $twentytwo) { // >22:30
            $toekomstig_reserv = [];
            $huidig_reserv = [];
            $verlopen_reserv = DB::table('reserverings')->where('datum', '=', $today)->orderBy('tijd', 'ASC')->get();
        } else if ($time > $twenty) { // 20:00-22:30
            $toekomstig_reserv = [];
            $huidig_reserv = DB::table("reserverings")
                ->where("datum", "=", $today)
                ->where("tijd", "like", "20:00-22:30")
                ->orderBy("tijd", "asc")
                ->get();
            $verlopen_reserv = DB::table("reserverings")
                ->where("datum", "=", $today)
                ->where(DB::raw("(tijd = '12:30-15:00' or tijd = '15:00-17:30' or tijd = '17:30-20:00')"))
                ->get();
        } else if ($time > $seventeen) { // 17:30-20:00
            $toekomstig_reserv = DB::table("reserverings")
                ->where("datum", "=", $today)
                ->where("tijd", "like", "20:00-22:30")
                ->orderBy("tijd", "asc")
                ->get();
            $huidig_reserv = DB::table("reserverings")
                ->where("datum", "=", $today)
                ->where("tijd", "like", "17:30-20:00")
                ->orderBy("tijd", "asc")
                ->get();
            $verlopen_reserv = DB::table("reserverings")
                ->where("datum", "=", $today)
                ->where(DB::raw("(tijd like '15:00-17:30' or tijd like '12:30-15:00')"))
                ->orderBy("tijd", "asc")
                ->get();
        } else if ($time > $fifteen) { // 15:00-17:30
            $toekomstig_reserv = DB::table("reserverings")
                ->where(DB::raw("datum = $today AND (tijd like '17:30-20:00' or tijd like '20:00-22:30')"))
                ->get();

            dd(DB::table("reserverings")
                ->where(DB::raw("(tijd like '17:30-20:00' or tijd like '20:00-22:30')"))
                ->get());
            $huidig_reserv = DB::table("reserverings")
                ->where("datum", "=", $today)
                ->where("tijd", "like", "15:00-17:30")
                ->orderBy("tijd", "asc")
                ->get();
            $verlopen_reserv = DB::table("reserverings")
                ->where("datum", "=", $today)
                ->where("tijd", "like", "12:30-15:00")
                ->orderBy("tijd", "asc")
                ->get();
        } else if ($time > $twelve) { // 12:30-15:00
            $toekomstig_reserv = DB::table("reserverings")
                ->where("datum", "=", $today)
                ->where(DB::raw("(tijd like '17:30-20:00' or tijd like '20:00-22:30' or tijd like '15:00-17:30')"))
                ->orderBy("tijd", "asc")
                ->get();
            $huidig_reserv = DB::table("reserverings")
                ->where(DB::raw("tijd LIKE '12:30-15:00' AND datum = $today"))
                ->orderBy("tijd", "asc")
                ->get();
            $verlopen_reserv = [];
        } else {
            $huidig_reserv = DB::table('reserverings')->where('datum', '=', $today)->orderBy('tijd', 'ASC')->get();
            $toekomstig_reserv = [];
            $verlopen_reserv = [];
        }

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
        $data = [
            'voornaam' => implode($request->all('voornaam')),
            'achternaam' => implode($request->all('achternaam')),
            'email' => implode($request->all('email')),
            'telefoon' => implode($request->all('telefoon')),
            'datum' => implode($request->all('datum')),
            'tijd' => implode($request->all('tijd')),
            'aant_personen' => implode($request->all('aant_personen'))
        ];

        Reservering::create($data);

        Mail::to($request->email)->send(new ReserveringConfirmatie($data));
        Mail::to('info@matsuya.nl')->send(new ReserveringConfirmatie($data));

        return redirect('/#reserveren')->with('status', 'Uw reservering is opgeslagen! Check uw e-mail/spamfolder voor de bevestiging.');
    }

    public function edit($id)
    {
        return view('reservering_beheren', ['reservering' => Reservering::find($id)]);
    }

    public function destroy(Request $request)
    {
        // dd($request);
        Reservering::find($request->id)->delete();

        Mail::to($request->email)->send(new ReserveringAnnulatie($request->reden));
        // return new ReserveringAnnulatie($request->reden);

        return redirect('/reserveringen')->with('status', 'De reservering is geannuleerd.');
    }

    public function search(Request $request)
    {
        // dd($request);
        $reservering = DB::table("reserverings")
            ->where("datum", "=", $request->datum)
            ->where("email", "=", $request->email)
            ->get();

        $id = $reservering[0]->id;

        return redirect('/reservering/' . $id);
    }

    public function update(Request $request)
    {
        $data = [
            'voornaam' => $request->voornaam,
            'achternaam' => $request->achternaam,
            'email' => $request->email,
            'telefoon' => $request->telefoon,
            'tijd' => $request->tijd,
            'datum' => $request->datum,
            'aant_personen' => $request->aant_personen,
        ];

        Reservering::find($request->id)->update($data);

        Mail::to($request->email)->send(new ReserveringBewerkt($data));

        return redirect('/reserveringen')->with('status', 'De reservering is aangepast.');
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