<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Matsuya | Reservering zoeken</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Yuji+Boku&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
        @vite(['resources/sass/admin.scss', 'resources/js/menu.js'])
    </head>
    <body>
        <main class="reservering-zoeken">
            <h2>Zoek een klant</h2>
            
            <section id="zoeken">
                <table class="klant-zoeken">
                    <thead>
                        <td>Emailadres</td>
                        <td>Datum</td>
                        <td>Zoeken</td>
                    </thead>
                    <tbody>
                        <tr>
                            <form action="/reserveringen/gezocht" method="post" name="zoeken" id="klant-zoek">
                                @csrf
                            <td><input type="text" name="email" id="email"></td>
                            <td><input type="date" name="datum" id="datum"></td>
                            <td><input type="submit" value="Zoeken"></td>
                            </form>
                        </tr>
                    </tbody>
                </table>

                <a href="/dashboard">Terug naar het dashboard</a>
            </section>
        </main>
    </body>
</html>