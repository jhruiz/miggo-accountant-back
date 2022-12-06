@component('mail::message')
# Introducción

El cuerpo de tu mensaje.

@component('mail::button', ['url' => env('APP_URL').'miggo-front/pages/forgot/recuperar-password.html?token='.$token])

Button Text
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent