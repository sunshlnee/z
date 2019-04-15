@extends('layouts.app')

@section('content')
    @include('admin.sizes._nav')

    <form method="POST" action="{{ route('admin.sizes.store') }}">
        @csrf

        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input{{ $errors->has('title') ? ' is-danger' : '' }}" name="title" title="title" value="{{ old('title') }}" required>
                @if ($errors->has('title'))
                    <p class="help is-danger">{{ $errors->first('title') }}</p>
                @endif
            </div>
        </div>
        <button type="submit" class="button is-primary">Save</button>
    </form>
@endsection