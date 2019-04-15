@extends('layouts.app')

@section('content')
    @include('admin.users._nav')
    <form action="?" method="GET" style="margin:0px 0px 10px 0px">
        <div class="container" style="margin:0px 0px 10px 0px">
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">ID</label>
                        <input class="input" name="id" value="{{ request('id') }}">
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Name</label>
                        <input class="input" name="name" value="{{ request('name') }}">
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Email</label>
                        <input class="input" name="email" value="{{ request('email') }}">
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Status</label>
                        <select class="select" name="status">
                            <option value=""></option>
                            @foreach ($statuses as $value => $label)
                                <option value="{{ $value }}"{{ $value === request('status') ? ' selected' : '' }}>{{ $label }}</option>
                            @endforeach;
                        </select>
                    </div>
                </div>
                <div class="column ">
                    <div class="field">
                        <label class="label">Search</label>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="button is-link">Search</button>
        <a href="{{ route('admin.users.create') }}" class="button is-success">Add User</a>
    </form>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->isWait())
                        <span class="badge badge-secondary">Waiting</span>
                    @endif
                    @if ($user->isActive())
                        <span class="badge badge-primary">Active</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $users->links() }}
@endsection