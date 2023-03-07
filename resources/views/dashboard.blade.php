<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Matsuya | Dashboard</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Yuji+Boku&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
        @vite(['resources/sass/admin.scss', 'resources/js/menu.js'])
    </head>
    <body>
        <main class="dashboard">
            <h2>Wat wil je doen?</h2>
            
            <ul>
                <li><a href="/reserveringen">Reserveringen van vandaag bekijken</a></li>
                <li><a href="/menu/toevoegen">Gerechten toevoegen</a></li>
                <li><a href="/menu/bewerken">Gerechten bewerken/verwijderen</a></li>
            </ul>
        </main>
    </body>
</html>

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
