@extends('layouts.app')

@section('title', config('app.name') . ' - онлайн магазин нижнего белья в Набережных Челнах.')

@section('content')
    <div class="columns">
        <div class="column is-3">
            @include('layouts.partials.sidebar')
        </div>
        <div class="column is-10">
            
            <p class="menu-label">
                <strong>Популярные товары</strong>
            </p>
            @include('products._products')
          
        </div>
    </div>
@endsection
