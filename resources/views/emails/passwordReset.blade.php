@component('mail::message')
# Introducción

El cuerpo de tu mensaje.

@component('mail::button', ['url' => 'http://localhost:85/response-password-reset?token='.$token])
Button Text
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent