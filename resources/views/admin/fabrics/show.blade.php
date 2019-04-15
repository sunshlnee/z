@extends('layouts.app')

@section('content')
    @include('admin.fabrics._nav')

        <a href="{{ route('admin.fabrics.edit', $fabric) }}" class="button is-primary">Edit</a>

        <form method="POST" action="{{ route('admin.fabrics.destroy', $fabric) }}" style="display:inline-block">
            @csrf
            @method('DELETE')
            <button class="button is-danger">Delete</button>
        </form>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $fabric->id }}</td>
        </tr>
        <tr>
            <th>Title</th><td>{{ $fabric->title }}</td>
        </tr>

    </table>
@endsection