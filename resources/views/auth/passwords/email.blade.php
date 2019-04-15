
@extends('layouts.app')

@section('content')
@section('breadcrumbs', Breadcrumbs::render())
@yield('breadcrumbs')
<div class="container">
    <div class="columns">
        <div class="column is-5 is-offset-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-title">
                        Сбросить пароль
                    </div>
                </div>
                <div class="card-content">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.send') }}">
                        @csrf
                        <div class="field">
                            <label class="label">Электронная почта</label>
                            <div class="control">
                              <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>
                        
                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-link">
                                    Отправить ссылку сброса пароля
                                </button>                            
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
