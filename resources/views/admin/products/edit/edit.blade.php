@extends('layouts.app')

@section('content')

    @include('admin.products._nav')

    <div class="container">
        <form method="POST" action="?">
            <div class="columns is-multiline">
                    @csrf @method('PUT')
                    <div class="column is-4">
                        <div class="field">
                            <label class="label">Code</label>
                            <div class="control">
                                <input class="input{{ $errors->has('code') ? ' is-danger' : '' }}" name="code" value="{{ old('code', $product->code) }}" required>
                            </div>
                            @if ($errors->has('code'))
                                <p class="help is-danger">{{ $errors->first('code') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="column is-4">
                        <div class="field">
                            <label class="label">Price</label>
                            <div class="control">
                                <input type="number" class="input{{ $errors->has('price') ? ' is-danger' : '' }}" name="price" value="{{ old('price', $product->price) }}" required>
                            </div>
                            @if ($errors->has('price'))
                                <p class="help is-danger">{{ $errors->first('price') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="column is-4">@include('layouts.fields.brands')</div>
                    <div class="column is-4">@include('layouts.fields.sizes')</div>
                    <div class="column is-4">@include('layouts.fields.fabrics')</div>
                    <div class="column is-4">@include('layouts.fields.colors')</div>
                    <button class="button is-link">Submit</button>
            </div>
        </form>
    </div>

@endsection