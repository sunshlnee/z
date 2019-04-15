@extends('layouts.app')

@section('title', 'Красивое нижнее белье в магазине '.config('app.name'). ', в Набережных Челнах.')

@section('content')
    <div class="columns">
        <div class="column is-3">
            @include('layouts.partials.sidebar')
        </div>
        <div class="column is-9">
            <p class="menu-label">
                <strong>Каталог</strong>
            </p>
            @section('breadcrumbs', Breadcrumbs::render())
            @yield('breadcrumbs')
            
            @include('products._products')
            {{ $products->links() }}
        </div>
    </div>
@endsection
