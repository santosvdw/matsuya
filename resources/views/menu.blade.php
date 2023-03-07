
@extends('layouts/layout')

@section('content')
<div id="menu">
                <div class="menu-download-btn">
                    <a download href="../assets/menu.pdf"><button class="button-cta button-green">Download het menu</button></a>
                </div>

                <div class="menu-page">
                    @foreach ($categorieen as $categorie)
                    <section id="{{$categorie->naam}}">
                        <h2>{{$categorie->naam}}
                        @if (!empty($categorie->opt_info))
                            <span class="categorie-opt_info">{{$categorie->opt_info}}</span>
                        @endif
                        </h2>
                        <div class="menu-page-cards">

                            @foreach ($menu as $gerecht)
                                @if ($gerecht->categorie_naam == $categorie->naam)
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
                                @endif
                            @endforeach
                    
                        </div>
                    </section>
                    @endforeach
                </div>
            </div>
@endsection