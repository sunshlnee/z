@extends('layouts.app')

@section('content')
    @include('admin.fabrics._nav')

    <form method="POST" action="{{ route('admin.fabrics.update', $fabric) }}">
        @csrf
        @method('PUT')

        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input{{ $errors->has('title') ? ' is-danger' : '' }}" name="title" value="{{ old('title', $fabric->title) }}" required>
                @if ($errors->has('title'))
                    <p class="help is-danger"><strong>{{ $errors->first('title') }}</strong></p>
                @endif
            </div>
            
        </div>

        <div class="form-group">
            <button type="submit" class="button is-primary">Save</button>
        </div>
    </form>
@endsection