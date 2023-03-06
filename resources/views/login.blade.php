<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Matsuya | Inloggen</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Yuji+Boku&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
        @vite(['resources/sass/admin.scss', 'resources/js/menu.js'])
    </head>
    <body>
        <main class="login">
            <h2>Voeg een gerecht toe</h2>
            
            <section id="item-toevoegen">
                <table>
                    <thead>
                        <td>Naam</td>
                        <td>Beschrijving</td>
                        <td>Categorie</td>
                        <td>Prijs</td>
                        <td>Foto</td>
                        <td>Pikant</td>
                        <td>Vega</td>
                        <td>Opslaan</td>
                    </thead>
                    <tbody>
                        <tr>
                            <form action="/menu/toegevoegd" method="post" name="menu_toevoegen" id="menu_toevoegen" enctype="multipart/form-data">
                                @csrf
                                <td><input autofocus required type="text" name="naam" id="naam"></td>
                                <td><input type="text" name="beschrijving" id="beschrijving"></td>
                                <td>
                                    <select required name="categorie_naam" id="categorie_naam">
                                    <optgroup label="Selectereb">Selecteren</optgroup>
                                    @foreach ($categorieen as $categorie)
                                        <option name="{{$categorie->naam}}" value="{{$categorie->naam}}">{{$categorie->naam}}</option>
                                    @endforeach    
                                    </select>
                                </td>
                                <td><input type="number" class="prijs" required step="0.01" name="prijs" id="prijs"></td>
                                <td><input type="file" name="foto" id="foto"></td>
                                <td>
                                        <label for="ja_pikant">Ja:</label>
                                        <input class="radio" type="radio" name="pikant" id="ja_pikant" value="ja" >
                                   
                                        <label for="nee_pikant">Nee:</label>
                                        <input class="radio" type="radio" name="pikant" id="nee_pikant" value="nee" checked>
                                </td>
                                <td>
                                    <label for="ja_vega">Ja:</label>
                                    <input class="radio" type="radio" name="vega" id="ja_vega" value="ja" >
                                
                                    <label for="nee_vega">Nee:</label>
                                    <input class="radio" type="radio" name="vega" id="nee_vega" value="nee" checked>
                                </td>
                                <td><input type="submit" value="Toevoegen"></td>
                            </form>
                        </tr>
                    </tbody>
                </table>

                <a href="/menu">Bekijk het menu</a>
            </section>
        </main>
    </body>
</html>