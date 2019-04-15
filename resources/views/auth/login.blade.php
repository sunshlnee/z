@extends('layouts.app')

@section('title', 'Авторизация в онлайн магазине нижнего белья' . config('app.name') . ' в Набережных Челнах')

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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="field">
                            <div class="control">
                                <input class="input is-large{{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" placeholder="Ваша почта" autofocus value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input class="input is-large{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="Ваш пароль" name="password" value="{{ old('email') }}">
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="field">
                            <label class="checkbox">
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
              Запомнить меня
            </label>
                        </div>
                        <button class="button is-block is-info is-large is-fullwidth">Войти</button>
                    </form>
                </div>
                <p class="has-text-grey">
                    <a href="{{ route('register') }}">Зарегистрироваться</a> &nbsp;·&nbsp;
                    <a href="{{ route('password.forgot') }}">Забыли пароль?</a> &nbsp;·&nbsp;
                </p>
            </div>
        </div>
    </div>
</section>
@endsection