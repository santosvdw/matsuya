<x-mail::message>
# Uw reservering is aangepast

Hoi {{$data['voornaam']}}, wat fijn dat u komt eten bij Matsuya! U heeft ons gevraagd om iets aan uw gegevens aan te passen. Dit zijn de nieuwe gegevens die u bij ons heeft opgegeven:

- Voornaam: __{{$data['voornaam']}}__
- Achternaam: __{{$data['achternaam']}}__
- E-mailadres: __{{$data['email']}}__
- Telefoonnummer: __{{$data['telefoon']}}__
- Datum: __{{$data['datum']}}__
- Tijdslot: __{{$data['tijd']}}__ @if($data['tijd'] == "20:00-22:30") _(MA-DO sluiten wij om 22:00)_ @endif

- Aantal personen: <strong>{{$data['aant_personen']}}</strong>

Zou u iets willen aanpassen aan deze gegevens? Zoals het moment waarop u wilt langskomen bijvoorbeeld of wilt u uw reservering annuleren? Neem dan <a href="tel:0229 238 634">telefonisch</a> of via <a href="mailto:matsuya_hoorn@outlook.com">e-mail</a> contact met ons op.

Ons adres is __Grote Beer 4, Hoorn__.

<br>Tot ziens,<br>
<a href="https://matsuya.nl/">{{ config('app.name') }}</a>

</x-mail::message>
