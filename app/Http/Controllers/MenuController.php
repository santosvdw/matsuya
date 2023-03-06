<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    // Show alle reserveringen

    // Store data
    public function store(Request $request)
    {
        Menu::create([
            'naam' => implode($request->all('naam')),
            'beschrijving' => implode($request->all('beschrijving')),
            'categorie_naam' => implode($request->all('categorie_naam')),
            'prijs' => implode($request->all('prijs')),
            'foto' => $request->file('foto')->store('fotos', 'public'),
            'pikant' => implode($request->all('pikant')),
            'vega' => implode($request->all('vega')),
        ]);

        return redirect('/menu/toevoegen')->with('status', 'Het gerecht is opgeslagen!');
    }

    public function add()
    {
        return view('menu_toevoegen', ['categorieen' => Categories::all()]);
    }

    public function index()
    {
        return view('menu');
    }

    public function edit($id)
    {
        return view('menu_gerecht_bewerken', ['categorieen' => Categories::all(), 'gerecht' => Menu::find($id)]);
    }

    // Menu updaten
    public function update(Request $request, $id)
    {
        // dd($request);

        if ($request->hasFile('foto')) {
            Menu::find($id)->update([
                'naam' => implode($request->all('naam')),
                'beschrijving' => implode($request->all('beschrijving')),
                'categorie_naam' => implode($request->all('categorie_naam')),
                'prijs' => implode($request->all('prijs')),
                'foto' => $request->file('foto')->store('fotos', 'public'),
                'pikant' => implode($request->all('pikant')),
                'vega' => implode($request->all('vega')),
            ]);
        } else {
            Menu::find($id)->update([
                'naam' => implode($request->all('naam')),
                'beschrijving' => implode($request->all('beschrijving')),
                'categorie_naam' => implode($request->all('categorie_naam')),
                'prijs' => implode($request->all('prijs')),
                // 'foto' => Menu::find($id)->foto->store('fotos', 'public'),
                'pikant' => implode($request->all('pikant')),
                'vega' => implode($request->all('vega')),
            ]);
        }

        $gerecht_naam = Menu::find($id)->naam;

        return redirect('/menu/bewerken')->with('status', "Het gerecht '$gerecht_naam' is bewerkt!");
    }

    public function destroy($id)
    {
        $gerecht_naam = Menu::find($id)->naam;
        Menu::find($id)->delete();

        return redirect('/menu/bewerken')->with('status', "Het gerecht '$gerecht_naam' is verwijderd.");
    }
}
