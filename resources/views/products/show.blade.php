@extends('layouts.app')

@section('title', $product->category->title . ' ' . $product->code . ' в магазине ' . config('app.name') . ', в Набережных Челнах')

@section('content')
<div class="columns">
    <div class="column is-3">
        @include('layouts.partials.sidebar')
    </div>
    <div class="column is-9">
        @section('breadcrumbs', Breadcrumbs::render())
        @yield('breadcrumbs')
        <div class="card large">
            <div class="card-content">
                <div class="media">
                    <gallery :images="{{$images}}"></gallery>
                </div>
                <div class="content">
                    <p>Артикул: {{ $product->code }}</p>
                    <p>Цена: {{ $product->price }} рублей</p>
                    @if($colors) <p>Цвета: {{$colors}} </p> @endif
                    @if($fabrics) <p>Состав: {{$fabrics}}</p> @endif
                    @guest
                        <label><p>Доступные размеры</p></label>
                        
                        <card-button :product="{{$product->id}}"
                        :sizes="{{$sizes}}" :auth="false"></card-button>
                    @else
                        <label><p>Выберите размер</p></label>

                        <card-button :product="{{$product->id}}"
                        :sizes="{{$sizes}}" :auth="true"></card-button>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection