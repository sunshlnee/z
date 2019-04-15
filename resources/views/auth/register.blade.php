@extends('layouts.app')

@section('title', 'Регистрация в онлайн магазине нижнего белья ' . config('app.name') . ' в Набережных Челнах')

@section('content')

@section('breadcrumbs', Breadcrumbs::render())

@yield('breadcrumbs')
<section class="hero">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
               <div class="box">
                    <figure class="avatar">
                        <img src="https://freeiconshop.com/wp-content/uploads/edd/person-flat-128x128.png">
                    </figure>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="field">
                            <div class="control">
                                <input class="input is-large{{ $errors->has('name') ? ' is-danger' : '' }}" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Ваше имя">
                                @if ($errors->has('name'))
                                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input class="input is-large{{ $errors->has('email') ? ' is-danger' : '' }}" type="text" name="email" value="{{ old('email') }}" required placeholder="Ваша электронная почта">
                                @if ($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input class="input is-large{{ $errors->has('password') ? ' is-danger' : '' }}" type="text" name="password" value="{{ old('password') }}" required placeholder="Ваш пароль">
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>
                        <button class="button is-block is-info is-large is-fullwidth">Подтвердить</button>
                    </form>
                </div>
                <p class="has-text-grey">
                    <a href="{{ route('login') }}">Уже зарегистрированны?</a> &nbsp;·&nbsp;
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
