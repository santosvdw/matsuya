<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Matsuya | Reservering bewerken</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Yuji+Boku&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
        @vite(['resources/sass/admin.scss', 'resources/js/menu.js'])
    </head>
    <body>
        <main class="reservering-annuleren">
            <h2>Reservering bewerken</h2>

             <table>
                <thead>
                    <td>Voornaam</td>
                    <td>Achternaam</td>
                    <td>Datum</td>
                    <td>Tijd</td>
                    <td>Aantal personen</td>
                    <td>Telefoon</td>
                    <td>Email</td>
                    <td>Opslaan</td>
                </thead>
                <tbody>
                    <form action="/reservering/bewerkt/{{$reservering->id}}" method="post" name="reservering-bewerkt" id="reservering-bewerkt">
                        @csrf
                        @method('PUT')
                        <td>
                            <input type="text" name="voornaam" id="voornaam" value="{{$reservering->voornaam}}"> 
                        </td>
                        <td>
                            <input type="text" name="achternaam" id="achternaam" value="{{$reservering->achternaam}}"> 
                        </td>
                        <td>
                            <input type="date" name="datum" id="datum" value="{{$reservering->datum}}"> 
                        </td>
                        <td>
                            <input type="text" name="tijd" id="tijd" value="{{$reservering->tijd}}"> 
                        </td>
                        <td>
                            <input type="number" name="aant_personen" id="aant_personen" value="{{$reservering->aant_personen}}"> 
                        </td>
                        <td>
                            <input type="tel" name="telefoon" id="telefoon" value="{{$reservering->telefoon}}"> 
                        </td>
                        <td>
                            <input type="text" name="email" id="email" value="{{$reservering->email}}"> 
                        </td>
                        <td><input type="submit" value="Wijzigingen opslaan"></td>
                    </form>
                </tbody>
             </table>
            


            <section id="reden">
                <h2>Reservering annuleren</h2>
                <h3>Wat is de reden?</h3>

                <form method="POST" action="/reservering/verwijderen/{{$reservering->id}}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{$reservering->id}}">
                <input type="hidden" name="email" value="{{$reservering->email}}">
                <input type="hidden" name="reservering" value="{{$reservering}}">
                {{-- <select name="reden" id="reden_annulering">
                    <option value="te laat gekomen">Te laat gekomen</option>
                    <option value="vorige keer niet gekomen">vorige keer niet gekomen</option>
                    <option value="overig" contenteditable="true">overig</option>
                </select> --}}
                <input type="radio" name="reden" id="te_laat" value="bent te laat gekomen">
                <label for="te_laat">Te laat gekomen</label><br>
                <input type="radio" name="reden" id="vorige_keer_afwezig" value="bent de vorige keer niet gekomen">
                <label for="vorige_keer_afwezig">Vorige keer afwezig</label><br>
                <input type="radio" name="reden" id="tel_afgemeld" value="heeft telefonisch/via email afgebeld">
                <label for="tel_afgemeld">Telefonisch/via email afgebeld</label><br>
                
                <br><br>
                <button class="delete-btn"> <i class="bi bi-trash3-fill"></i> Verwijderen</button>
                </form>
            </section>
        </main>
    </body>
</html>