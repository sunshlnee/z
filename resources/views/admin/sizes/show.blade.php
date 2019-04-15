@extends('layouts.app')

@section('content')
    @include('admin.sizes._nav')

    <a href="{{ route('admin.sizes.edit', $size) }}" class="button is-primary">Edit</a>

    <form method="POST" action="{{ route('admin.sizes.destroy', $size) }}" style="display:inline-block">
        @csrf
        @method('DELETE')
        <button class="button is-danger">Delete</button>
    </form>

    <div class="container">
        <table class="table">
            <tbody>
            <tr>
                <th>ID</th><td>{{ $size->id }}</td>
            </tr>
            <tr>
                <th>Title</th><td>{{ $size->title }}</td>
            </tr>
        </table>
    </div>
@endsection