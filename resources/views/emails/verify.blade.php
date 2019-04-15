@component('mail::message')
# Подтверждение почты

Пожалуйста, перйдите по этой ссылке:

@component('mail::button', ['url' => route('register.verify', ['token' => $user->verify_token])])
Перейти
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
