@extends('layouts.app')

@section('content')
    @include('admin.products._nav')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.products.edit', $product) }}" class="button is-primary">Edit</a>

        <a href="{{ route('admin.products.edit.photos', $product) }}" class="button is-primary">Edit Photos</a>

        <form method="POST" action="{{ route('admin.products.recommend', $product) }}" style="display:inline-block"> @csrf
                @if($product->isRecommended())
                    <button class="button is-info">Set Standart</button>
                @else
                    <button class="button is-warning">Set Recommended</button>
                @endif
        </form>

        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" style="display:inline-block; padding: 0px 0px 6px 0px">
            @csrf
            @method('DELETE')
            <button class="button is-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
            <tr><th>ID</th><td>{{ $product->id }}</td></tr>
            <tr><th>Code</th><td>{{ $product->code }}</td></tr>
            <tr><th>Price</th><td>{{ $product->price }}</td></tr>
            <tr><th>Category</th><td><a href="{{ route('admin.categories.show', $product->category) }}">{{ $product->category->title }}</a></td></tr>
            <tr><th>Brand</th><td><a href="{{ route('admin.brands.show', $product->brand ?? '') }}">{{ $product->brand->title ?? '' }}</a></td></tr>
            <tr>
                <th>Colors</th>
                <td>
                    @foreach ($colors as $key => $value)
                        <a href="{{ route('admin.colors.show', $key) }}">{{ $value . ','}}</a>
                    @endforeach
                </td>
            </tr>

            <tr>
                <th>Sizes</th>
                <td>
                    @foreach ($sizes as $key => $value)
                        <a href="{{ route('admin.sizes.show', $key) }}">{{ $value . ','}}</a>
                    @endforeach
                </td>
            </tr>

            <tr>
                <th>Fabrics</th>
                <td>
                    @foreach ($fabrics as $key => $value)
                        <a href="{{ route('admin.fabrics.show', $key) }}">{{ $value . ','}}</a>
                    @endforeach
                </td>
            </tr>

            {{-- <tr>
                <th>Photos</th>
                <td>
                    <div class="row">
                        @foreach($product->images() as $image)
                            <div class="col-md-2">
                                <div style="height: 100px; width: 100px;">
                                    <img src="{{$image->getImage()}}" alt="" style="width: 100%; height: 100%;">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr> --}}
        </tbody>
    </table>
@endsection