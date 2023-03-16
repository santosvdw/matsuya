<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Matsuya | Homepagina</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Yuji+Boku&display=swap" rel="stylesheet" />
        <meta name="description" content="Matsuya is het beste Japans restaurant van Hoorn. Hier kun je allerlei lekkere Japanse gerechten, zoals Sushi en Poke Bowls halen. Kom snel langs!">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
        <meta name="keywords" content="matsuya, japans restaurant, hoorn, japanse restaurant, restaurant, hoorns restaurant, matsuya hoorn, matsuya japans restaurant, lekker eten, teppanyaki, matsuya restaurant, sushi, tempura hoorn, sushi hoorn, aziatisch eten, matsuya aziatisch restaurant, aziatisch restaurant, aziatisch eten afhalen, poke bowl, poke bowl hoorn, matsuya poke bowl,">
        <meta name="robots" content="index, follow">
        <meta name="language" content="Dutch">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
@if (session('status'))
    <div class="alert">
        <i class="alert-x close-alert bi bi-x-lg"></i>
        {{ session('status') }}
    </div>
@endif

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

        <main>
            <header class="home">
                <div class="header-content">
                    <h1 id="title">Welkom bij <span class="underline">Matsuya</span>!</h1>
                    <h5>Het beste Japanse restaurant van Hoorn</h5>
                    <button class="button-cta button-green"><a href="/#reserveren">Reserveer nu</a></button>
                </div>
                <div class="header-img">
                    <img src="{{asset('assets/header-img.webp')}}" alt="Ons eten" />
                </div>
            </header>

            <div id="menu-open-contact">
                <div id="menu">
                    <div class="menu-title">
                        <h2 class="cream">Menu</h2>
                    </div>
                    <div class="cards-and-overlay-wrapper">
                        <div class="menu-cards">
                            <div class="menu-card">
                                <div class="menu-card-text">
                                    <div class="menu-card-text-title">
                                        <h5 class="cream antic">Sushi</h5>
                                        <div class="menu-card-text-title-star">
                                            <img src="{{asset('assets/menu-star.webp')}}" loading="lazy" alt="Matsuya" />
                                        </div>
                                    </div>
                                    <p class="cream">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, excepturi.</p>
                                </div>
                                <div class="menu-card-bg-overlay"></div>
                                <div class="menu-card-bg"><img src="{{asset('assets/foto-menu-1.webp')}}" loading="lazy" alt="Matsuya" /></div>
                            </div>
                            <!-- Card 1-->
                            <div class="menu-card">
                                <div class="menu-card-text">
                                    <div class="menu-card-text-title">
                                        <h5 class="cream antic">Yakitori</h5>
                                        <div class="menu-card-text-title-star">
                                            <img src="{{asset('assets/menu-star.webp')}}" loading="lazy" alt="Matsuya" />
                                        </div>
                                    </div>
                                    <p class="cream">Lorem, ipsum dolor sit amet consectetur adipisicing..</p>
                                </div>
                                <div class="menu-card-bg-overlay"></div>
                                <div class="menu-card-bg"><img src="{{asset('assets/foto-menu-2.webp')}}" loading="lazy" alt="Matsuya" /></div>
                            </div>
                            <!-- Card 2-->
                            <div class="menu-card">
                                <div class="menu-card-text">
                                    <div class="menu-card-text-title">
                                        <h5 class="cream antic">Doburi</h5>
                                        <div class="menu-card-text-title-star">
                                            <img src="{{asset('assets/menu-star.webp')}}" loading="lazy" alt="Matsuya" />
                                        </div>
                                    </div>
                                    <p class="cream">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, excepturi.</p>
                                </div>
                                <div class="menu-card-bg-overlay"></div>
                                <div class="menu-card-bg"><img src="{{asset('assets/foto-menu-3.webp')}}" loading="lazy" alt="Matsuya" /></div>
                            </div>
                            <!-- Card 3-->
                            <div class="menu-card">
                                <div class="menu-card-text">
                                    <div class="menu-card-text-title">
                                        <h5 class="cream antic">Kaseiki</h5>
                                        <div class="menu-card-text-title-star">
                                            <img src="{{asset('assets/menu-star.webp')}}" loading="lazy" alt="Matsuya" />
                                        </div>
                                    </div>
                                    <p class="cream">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, excepturi.</p>
                                </div>
                                <div class="menu-card-bg-overlay"></div>
                                <div class="menu-card-bg"><img src="{{asset('assets/foto-menu-2.webp')}}" loading="lazy" alt="Matsuya" /></div>
                            </div>
                            <!-- Card 4-->
                        </div>
                        <div class="menu-cards-overlay"></div>
                    </div>
                    <div class="menu-cta">
                        <button class="button-cta button-cream"><a href="/menu">Bekijk ons menu</a></button>
                    </div>
                </div>
                <div id="open-contact">
                    <div id="openingstijden">
                        <h2 class="cream">Openingstijden</h2>
                        <p class="white">MA-DO: 12:30-22:00<br>VR-ZO: 12:30-22:30</p>
                    </div>
                    <div id="contact">
                        <h2 class="cream">Contact</h2>
                        <a class="white" href="mailto:matsuya_hoorn@outlook.com">matsuya_hoorn@outlook.com</a>
                        <a class="white" href="tel:0229238634">0229 238 634</a>
                    </div>
                    <div id="adres">
                        <h2 class="cream">Adres</h2>
                        <p class="white">Grote Beer 4, 1622 ES Hoorn</p>
                    </div>
                </div>
            </div>
            <!--Menu-open-contact-->

            <div id="reserveren">
                <div id="reserveren-titel">
                    <h2>Reserveren</h2>
                    <h4>Plan uw bezoek aan ons restaurant!</h4>
                </div>
                <form method="POST" action="/reserveren" name="reserveren" id="reserveren">
                    @csrf
                    <div class="form-input-field">
                        <div id="voornaam-input">
                            <input required type="text" name="voornaam" id="voornaam" />
                            <label for="voornaam">Voornaam:</label>
                        </div>

                        <div id="achternaam-input">
                            <input required type="text" name="achternaam" id="achternaam" />
                            <label for="achternaam">Achternaam:</label>
                        </div>

                        <div id="emailadres-input">
                            <input required type="email" name="email" id="email" />
                            <label for="emailadres">Emailadres:</label>
                        </div>

                        <div id="telefoonnummer-input">
                            <input required type="tel" min="0" name="telefoon" id="telefoon" />
                            <label for="telefoonnummer">Telefoonnummer:</label>
                        </div>

                        <div id="datum-input">
                            <input required type="date" name="datum"  id="datum" />
                            <label for="datum">Datum:</label>
                        </div>

                        <div id="tijd-input">
                            <select required name="tijd" id="tijd">
                                
                            </select>
                            <label for="tijd">Tijd:</label>
                        </div>

                        <div id="aantal-personen-input">
                            <input required type="number" name="aant_personen" min="1" max="30" id="aant_personen" />
                            <label for="aantal-personen">Aantal personen:</label>
                        </div>
                    </div>

                    <button type="submit" id="reserveer-submit" class="button-cta button-green">Reserveer nu</button>
                </form>
            </div>
            <!--Reserveren-->

            <div id="reviews">
                <h2>Reviews</h2>
                <div class="cards">
                    <div class="review-card">
                        <div class="review-card-image">
                            <img src="{{asset('assets/persoon-1.webp')}}" loading="lazy" alt="persoon 1" />
                        </div>
                        <div class="review-card-star-text">
                            <div class="review-card-star-text-name"><h4 class="review-card-star-text-name-title">Silvia de Mol</h4></div>
                            <div class="review-card-star-text-review">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro labore, quos nemo ullam omnis tempora quisquam minima repudiandae neque animi.</p>
                            </div>
                            <div class="review-card-star-text-stars">
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                            </div>
                        </div>
                    </div>
                    <div class="review-card">
                        <div class="review-card-image">
                            <img src="{{asset('assets/persoon-2.webp')}}" loading="lazy" alt="persoon 1" />
                        </div>
                        <div class="review-card-star-text">
                            <div class="review-card-star-text-name"><h4 class="review-card-star-text-name-title">Julia Smit</h4></div>
                            <div class="review-card-star-text-review">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro labore, quos nemo ullam omnis tempora quisquam minima repudiandae neque animi.</p>
                            </div>
                            <div class="review-card-star-text-stars">
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                            </div>
                        </div>
                    </div>
                    <div class="review-card">
                        <div class="review-card-image">
                            <img src="{{asset('assets/persoon-3.webp')}}" loading="lazy" alt="persoon 1" />
                        </div>
                        <div class="review-card-star-text">
                            <div class="review-card-star-text-name"><h4 class="review-card-star-text-name-title">John Stegen</h4></div>
                            <div class="review-card-star-text-review">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro labore, quos nemo ullam omnis tempora quisquam minima repudiandae neque animi.</p>
                            </div>
                            <div class="review-card-star-text-stars">
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                                <img src="{{asset('assets/ster.webp')}}" loading="lazy" class="review-card-star-text-stars-star" alt="Ster" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Reviews-->
        </main>

        <footer>
            <div class="top-footer">
                <div class="contact-informatie">
                    <h5>Contactinformatie</h5>
                    <ul>
                        <li>Grote Beer 4, 1622 ES Hoorn</li>
                        <li><a href="mailto:matsuya_hoorn@outlook.com">matsuya_hoorn@outlook.com</a></li>
                        <li><a href="tel:0229 238 634">0229 238 634</a></li>
                    </ul>
                </div>
                <div class="sociale-media">
                    <div class="content">
                        <h5>Sociale media</h5>
                        <ul>
                            <li><a href="https://instagram.com/matsuyahoorn" target="_blank">Instagram</a></li>
                            <li><a href="https://www.facebook.com/profile.php?id=100088068972733" target="_blank">Facebook</a></li>
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
                            {{-- <li><a href="{{ route('login') }}">Log in</a></li> --}}
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
