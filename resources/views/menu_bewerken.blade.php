<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Matsuya | Gerecht toevoegen</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Yuji+Boku&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
        @vite(['resources/sass/admin.scss', 'resources/js/menu.js'])
    </head>
    <body>
        @if (session('status'))
            <div class="alert">
                <i class="alert-x close-alert bi bi-x-lg"></i>
                {{ session('status') }}
            </div>
        @endif
        <main class="gerecht-kiezen">
            <h2 class="gerecht-kiezen-titel">Kies een gerecht</h2>
            <div class="links">
                <a href="/menu">Bekijk het menu</a> | <a href="/menu/toevoegen">Gerecht toevoegen</a> | <a href="/dashboard">Terug naar het dashboard</a>
            </div>

            <ul>
                @foreach ($categorieen as $categorie)
                    <li class="no-bullet"><h4>{{$categorie->naam}}</h4></li>
                <div class="gerechten">
                    @foreach ($menu as $gerecht)
                        @if ($gerecht->categorie_naam == $categorie->naam)
                            <li><a href="/menu/bewerken/{{$gerecht->id}}">{{$gerecht->naam}}</a></li>
                        @endif
                    @endforeach
                </div>
                @endforeach
            </ul>
        </main>
    </body>
</html>