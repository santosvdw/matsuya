<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Matsuya | Reserveringen</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Yuji+Boku&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
        @vite(['resources/sass/admin.scss', 'resources/js/reserveringen.js'])
    </head>
    <body>
        <main class="reserveringen">
            <header>
                <h2>De reserveringen van vandaag</h2>
            </header>
            <table>
                <thead>
                    <td>Naam</td>
                    <td>Tijd</td>
                    <td>Aantal personen</td>
                    <td>Telefoon</td>
                    <td>Email</td>
                </thead>
                <tbody>
                @foreach ($huidig as $reservering)
                <tr class="huidig">
                    <td class="reservering-naam">{{$reservering->achternaam}}, {{$reservering->voornaam[0]}}.</td>
                    <td>{{substr($reservering->tijd, 0, 5)}}</td>
                    <td>{{$reservering->aant_personen}}</td>
                    <td><a href="tel:{{$reservering->telefoon}}">{{$reservering->telefoon}}</a></td>
                    <td><a href="mailto:{{$reservering->email}}">{{$reservering->email}}</a></td>
                </tr>
                @endforeach
                @foreach ($toekomstig as $reservering)
                <tr class="toekomstig">
                    <td class="reservering-naam">{{$reservering->achternaam}}, {{$reservering->voornaam[0]}}.</td>
                    <td>{{substr($reservering->tijd, 0, 5)}}</td>
                    <td>{{$reservering->aant_personen}}</td>
                    <td><a href="tel:{{$reservering->telefoon}}">{{$reservering->telefoon}}</a></td>
                    <td><a href="mailto:{{$reservering->email}}">{{$reservering->email}}</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <div class="verlopen-reserveringen-show-hide">
                <button id="laat-reserveringen-zien" class="toggle-btn">Laat verlopen reserveringen zien</button>
                <button id="verberg-reserveringen" class="toggle-btn hide">Verberg de verlopen reserveringen</button>
            </div>

            <section id="verlopen-reserveringen">
                <h2>Verlopen reserveringen:</h2>
                <table>
                    <thead>
                        <td>Naam</td>
                        <td>Tijd</td>
                        <td>Aantal personen</td>
                        <td>Telefoon</td>
                        <td>Email</td>
                    </thead>
                    <tbody>
                    @foreach ($verlopen as $reservering)
                    <tr class="verlopen">
                        <td class="reservering-naam">{{$reservering->achternaam}}, {{$reservering->voornaam[0]}}.</td>
                        <td>{{substr($reservering->tijd, 0, 5)}}</td>
                        <td>{{$reservering->aant_personen}}</td>
                        <td><a href="tel:{{$reservering->telefoon}}">{{$reservering->telefoon}}</a></td>
                        <td><a href="mailto:{{$reservering->email}}">{{$reservering->email}}</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>

            <a href="/dashboard">Terug naar dashboard</a>
        </main>
    </body>
</html>