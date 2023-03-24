<x-mail::message>
# Uw reservering is geannuleerd.

Beste klant, <br>
Uw reservering is geannuleerd. Dit heeft de volgende reden:<br>
- <strong>U {{$reden}}</strong><br>

Als u vragen heeft, kunt u ons <a href="tel:0229 238 634">telefonisch</a> of via <a href="mailto:matsuya_hoorn@outlook.com">e-mail</a> bereiken.

Excuses voor het ongemak.<br><br>

Met vriendelijke groet,<br>
<a href="https://matsuya.nl">{{ config('app.name') }}</a>
</x-mail::message>
