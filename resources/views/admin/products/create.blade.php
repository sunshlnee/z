@extends('layouts.app')

@section('content')
    @include('admin.products._nav')
    <form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
        @csrf
        
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Common</p>
            </header>
        
            <div class="card-content">
                <div class="columns">
                    <div class="column is-2">
                        <div class="field">
                            <label class="label">Code</label>
                            <div class="control">
                                <input class="input{{ $errors->has('code') ? ' is-danger' : '' }}" name="code" value="{{ old('code') }}" required>
                                @if ($errors->has('code'))
                                    <p class="help is-danger">{{ $errors->first('code') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="column is-2">
                        <div class="field">
                            <label class="label">Price</label>
                            <div class="control">
                                <input class="input{{ $errors->has('price') ? ' is-danger' : '' }}" name="price" value="{{ old('price') }}" required>
                                @if ($errors->has('price'))
                                    <p class="help is-danger">{{ $errors->first('price') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="column is-2">
                        <div class="field">
                            <label class="label">Category</label>
                            <div class="control">
                                <div class="select{{ $errors->has('category_id') ? ' is-danger' : '' }}">
                                    <select required name="category_id">
                                        <option value=""></option>
                                        @foreach ($parents as $parent)
                                            <option value="{{ $parent->id }}"{{ $parent->id == old('category_id') ? ' selected' : '' }}>
                                                @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                                                {{ $parent->title }}
                                            </option>
                                        @endforeach;
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <p class="help is-danger">{{ $errors->first('category_id') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column is-3">
                        <div class="file">
                          <label class="file-label">
                            <input class="file-input" type="file" name="photo">
                            <span class="file-cta">
                              <span class="file-label">
                                Set Prewiew photo
                              </span>
                            </span>
                          </label>
                        </div>
                    </div>

                    <div class="column is-3">
                        <div class="file">
                          <label class="file-label">
                            <input class="file-input" type="file" name="photos[]" multiple>
                            <span class="file-cta">
                              <span class="file-label">
                                Set main photos
                              </span>
                            </span>
                          </label>
                        </div>
                    </div>

                </div>
                <div class="columns">
                    <div class="column is-3">@include('layouts.fields.brands')</div>
                    <div class="column is-3">@include('layouts.fields.sizes')</div>
                    <div class="column is-3">@include('layouts.fields.fabrics')</div>
                    <div class="column is-3">@include('layouts.fields.colors')</div>
                </div>
                <button type="submit" class="button is-link">Save</button>
            </div>
        </div>
    </form>

@endsection