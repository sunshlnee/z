@extends('layouts.app')

@section('content')
    @include('admin.colors._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.colors.edit', $color) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('admin.colors.destroy', $color) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>ID</th><td>{{ $color->id }}</td>
            </tr>
            <tr>
                <th>Name</th><td>{{ $color->title }}</td>
            </tr>
        </table>
@endsection