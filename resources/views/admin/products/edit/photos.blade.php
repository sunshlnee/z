@extends('layouts.app')

@section('content')

    <form method="POST" action="?" enctype="multipart/form-data"> @csrf
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
        <button class="button is-link">Upload</button>
    </form>
    <hr>
    <div class="container">
        @foreach($photos as $key => $photo)
            <div class="container">
                <img src="/uploads/{{$photo}}" width="200px">
                <form method="POST" action="{{route('admin.products.edit.photos.delete', $key)}}" style="display: inline;"> @method('DELETE') @csrf
                    <button class="button is-danger">Delete</button> 
                </form>           
            </div>
        @endforeach
    </div>
@endsection