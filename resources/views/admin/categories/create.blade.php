@extends('layouts.app')

@section('content')
@include('admin.categories._nav')

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input{{ $errors->has('title') ? ' is-danger' : '' }}" name="title" value="{{ old('title') }}" >
                @if ($errors->has('title'))
                    <p class="help is-danger"><strong>{{ $errors->first('title') }}</strong></p>
                @endif
            </div>
        </div>

        <div class="field">
            <label class="label">Parent</label>
            <select class="select{{ $errors->has('parent') ? ' is-danger' : '' }}" name="parent">
                <option value=""></option>
                @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}"{{ $parent->id == old('parent') ? ' selected' : '' }}>
                        @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                        {{ $parent->title }}
                    </option>
                @endforeach;
            </select>
            @if ($errors->has('parent'))
                <p class="help is-danger"><strong>{{ $errors->first('parent') }}</strong></p>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="button is-primary">Save</button>
        </div>
    </form>
@endsection