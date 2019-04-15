@extends('layouts.app')

@section('content')
    @include('admin.products._nav')
        <form action="?" method="GET" style="margin:0px 0px 10px 0px">
            <div class="container" style="margin:0px 0px 10px 0px">
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">ID</label>
                            <div class="control">
                                <input class="input" name="id" value="{{ request('id') }}">
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field">
                            <label class="label">Code</label>
                            <div class="control">
                                <input class="input" name="code" value="{{ request('code') }}">
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field">
                            <label class="label">Price</label>
                            <div class="control">
                                <input class="input" name="price" value="{{ request('price') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="button is-link">Search</button>
            <a href="{{ route('admin.products.create') }}" class="button is-success">Add Product</a>
        </form>

    <table class="table is-hoverable is-fullwidth">
        <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Price</th>
            <th>Category</th>
            <th>Brand</th>
            <th>MainPhoto</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>    
                <td>{{ $product->id }}</td>
                <td><a href="{{ route('admin.products.show', $product) }}">{{ $product->code }}</a></td>
                <td>{{ $product->price }}</td>
                <td><a href="{{ route('admin.categories.show', $product->category) }}">{{ $product->category->title }}</a></td>
                <td><a href="{{ route('admin.brands.show', $product->brand ?? '') }}">{{ $product->brand->title ?? 'Без бренда' }}</a></td>
                <td><img class="img-rounded m-x-auto d-block product-image" src="{{$product->getPreview()}}" alt="" width="200px" height="200px"></td>
                <td>
                    @if ($product->isRecommended())
                        <span class="badge badge-secondary">recommended</span>
                    @else
                        <span class="badge badge-primary">standart</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $products->links() }}
@endsection