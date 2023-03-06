@extends('layout/layout')

@section('content')
    <div id="contact-page">
                <div id="contact-page-gegevens">
                    <h2>Contactgegevens</h2>
                    <table>
                        <tbody>
                            <tr>
                                <td class="bold">Openingstijden</td>
                                <td>MA-DO | 12:30-22:00<br>VR-ZO | 12:30-22:30</td>
                            </tr>
                            <tr>
                                <td class="bold">Adres</td>
                                <td>Grote Beer 4, Hoorn</td>
                            </tr>
                            <tr>
                                <td class="bold">Telefoonnummer</td>
                                <td><a href="tel:0229 238 634">0229 238 634</a></td>
                            </tr>
                            <tr>
                                <td class="bold">Emailadres</td>
                                <td><a href="mailto:email@adres.nl">Email@adres.nl</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="map">
                    <h2>Onze locatie</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d856.0093863293451!2d5.0369566621096835!3d52.6390192642159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c8a96d684c803b%3A0x6e4c4d036d1177b7!2sMatsuya!5e0!3m2!1snl!2snl!4v1677852892792!5m2!1snl!2snl"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        id="map-frame"
                    ></iframe>
                </div>
            </div>
@endsection