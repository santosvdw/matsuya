<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Matsuya | @if (empty($title))
                            Menu  
                        @else
                            {{$title}}        
                        @endif</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Yuji+Boku&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <nav id="nav">
            <div class="desktop">
                <div class="nav-links">
                    <ul class="nav-links-ul">
                        <li><a href="/">Home</a></li>
                        <li><a href="/menu">Menu</a></li>
                        <li><a href="/#reserveren">Reserveren</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                <div class="nav-rechts"><a href="/vacatures">Vacatures</a></div>
            </div>
            <div class="phone">
                <div class="nav-phone-logo">
                    <img src="{{asset('assets/logo.webp')}}" alt="Matsuya" id="nav-tel-logo-img" />
                </div>
                <i id="open-button" class="bi bi-list"></i>
                <div id="nav-tel-menu">
                    <div id="nav-tel-menu-top">
                        <img src="{{asset('assets/logo.webp')}}" alt="Matsuya" id="nav-tel-menu-logo-img" />
                        <i id="close-button" class="bi bi-x-lg"></i>
                    </div>
                    <div id="nav-tel-menu-list">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/menu">Menu</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li><a href="/vacatures">Vacatures</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="nav-logo"><img id="nav-logo-img" src="{{asset('assets/logo.webp')}}" alt="Matsuya"/></div>
        </nav>

        <main class="other">
            <header>
                <div class="header-title">
                    <h1>@if (empty($title))
                            Menu  
                        @else
                            {{$title}}        
                        @endif
                </h1>
                </div>
                <div class="background-image-header">
                    <div class="background-image-header-overlay"></div>
                    <img src="{{asset('assets/foto-menu-2.webp')}}" alt="Japans eten als achtergrondafbeelding" id="background-image-header-img" />
                </div>
            </header>
            @yield('content')
        </main>

        <footer>
            <div class="top-footer">
                <div class="contact-informatie">
                    <h5>Contactinformatie</h5>
                    <ul>
                        <li>Grote Beer 4, 1622 ES Hoorn</li>
                        <li><a href="mailto:email@adres.nl">Email@adres.nl</a></li>
                        <li><a href="tel:0229 238 634">0229 238 634</a></li>
                    </ul>
                </div>
                <div class="sociale-media">
                    <div class="content">
                        <h5>Sociale media</h5>
                        <ul>
                            <li><a href="https://instagram.com/matsuyahoorn">Instagram</a></li>
                            <li><a href="https://facebook.com">Facebook</a></li>
                        </ul>
                    </div>
                </div>
                <div class="paginas">
                    <div class="content">
                        <h5>Pagina's</h5>
                        <ul>
                            <li><a href="/">Homepagina</a></li>
                            <li><a href="/menu">Menu</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li><a href="/vacatures">Vacatures</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bottom-footer">
                <div class="copyright">Matsuya &#169; 2023, Alle rechten voorbehouden</div>
                <div class="watermark">
                    Deze website is gemaakt door
                    <span class="watermark-link">
                        <a href="https://santosvdw.nl">Santos van der Wansem</a>
                    </span>
                </div>
            </div>
        </footer>
    </body>
</html>
