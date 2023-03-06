<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Matsuya | Menu-item toevoegen</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Yuji+Boku&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
        @vite(['resources/sass/admin.scss', 'resources/js/menu.js'])
    </head>
    <body>
        <main class="menu-bewerken">
            <h2>Bewerk dit gerecht</h2>
            
            <section id="gerecht-bewerken">
                <table class="item-bewerken">
                    <thead>
                        <td>Naam</td>
                        <td>Beschrijving</td>
                        <td>Categorie</td>
                        <td class="prijs-bewerken">Prijs</td>
                        <td>Foto</td>
                        <td>Pikant</td>
                        <td>Vega</td>
                        <td>Opslaan</td>
                    </thead>
                    <tbody>
                        <tr>
                            <form action="/menu/bewerken/{{$gerecht->id}}/bewerkt" method="POST" name="menu_toevoegen" id="menu_toevoegen" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td><input autofocus required type="text" class="naam-bewerken" value="{{$gerecht->naam}}" name="naam" id="naam"></td>
                                <td><input type="text" name="beschrijving" value="{{$gerecht->beschrijving}}" id="beschrijving"></td>
                                <td>
                                    <select required name="categorie_naam" id="categorie_naam">
                                    <optgroup label="Selecteren">Selecteren</optgroup>
                                    <option name="{{$gerecht->categorie_naam}}" value="{{$gerecht->categorie_naam}}">{{$gerecht->categorie_naam}}</option>
                                    @foreach ($categorieen as $categorie)
                                        @if ($categorie->naam == $gerecht->categorie_naam)
                                            @continue
                                        @endif
                                        <option name="{{$categorie->naam}}" value="{{$categorie->naam}}">{{$categorie->naam}}</option>
                                    @endforeach    
                                    </select>
                                </td>
                                <td class="prijs-bewerken"><input class="prijs-bewerken" type="number" required step="0.01" name="prijs" value="{{$gerecht->prijs}}" id="prijs"></td>
                                <td>
                                    <div class="table-img">
                                        <input type="file" name="foto" id="foto">
                                        <img src="/storage/{{$gerecht->foto}}"  loading="lazy" alt="{{$gerecht->naam}}" />
                                    </div>
                                </td>
                                <td>
                                    <label for="ja_pikant">Ja:</label>
                                    <input class="radio" type="radio" name="pikant" id="ja_pikant" value="ja" 
                                    @if ($gerecht->pikant == "ja")
                                        checked
                                    @endif
                                    >
                                
                                    <label for="nee_pikant">Nee:</label>
                                    <input class="radio" type="radio" name="pikant" id="nee_pikant" value="nee" 
                                    @if ($gerecht->pikant == "nee")
                                        checked
                                    @endif
                                    >
                                </td>
                                <td>
                                    <label for="ja_vega">Ja:</label>
                                    <input class="radio" type="radio" name="vega" id="ja_vega" value="ja"
                                    @if ($gerecht->vega == "ja")
                                        checked
                                    @endif
                                    >
                                
                                    <label for="nee_vega">Nee:</label>
                                    <input class="radio" type="radio" name="vega" id="nee_vega" value="nee" 
                                    @if ($gerecht->vega == "nee")
                                        checked
                                    @endif
                                    >
                                </td>
                                <td><input type="submit" value="Bewerken"></td>
                            </form>
                        </tr>
                    </tbody>
                </table>

                <a href="/menu">Bekijk het menu</a>
            </section>

            <section id="oude-card">
                <h2>Oude weergave:</h2>

                <div class="menu-page-card @if ($gerecht->categorie_naam == "Menu Box") menu-box @endif ">
                    <div class="menu-page-card-img">
                        <img src="/storage/{{$gerecht->foto}}" loading="lazy" alt="{{$gerecht->naam}}" />
                    </div>
                    <div class="menu-page-card-desc">
                        <h5>{{$gerecht->naam}}</h5>
                        @if (!empty($gerecht->beschrijving))
                            <p class="menu-page-card-desc-text">({{$gerecht->beschrijving}})</p>
                        @endif
                        <div class="menu-page-card-desc-price-icons">
                            <p class="menu-page-card-desc-price">&#8364;{{$gerecht->prijs}}</p>
                            <span class="menu-page-card-desc-icons">
                                @if ($gerecht->pikant =='ja')
                                    <img src="{{asset("../assets/pittig.png")}}" alt="Pittig">  
                                @endif

                                @if ($gerecht->vega =='ja')
                                    <img src="{{asset("../assets/vega.png")}}" alt="Vega">  
                                @endif

                            </span>
                        </div>
                    </div>
                </div>
            </section>

            <section id="gerecht-verwijderen">
                <h3 class="rood">Gerecht verwijderen</h3>

                <form method="POST" action="/menu/verwijderen/{{$gerecht->id}}">
                @csrf
                @method('DELETE')
                <button class="delete-btn"> <i class="bi bi-trash3-fill"></i> Verwijderen</button>
                </form>
            </section>
        </main>
    </body>
</html>