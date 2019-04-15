@component('mail::message')
# Сброс пароля

Пожалуйста, перйдите по этой ссылке:

@component('mail::button', ['url' => route('password.reset', ['token' => $user->password_token])])
Перейти
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
