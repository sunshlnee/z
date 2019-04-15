@extends('layouts.app')

@section('content')
    @include ('admin._nav', ['page' => ''])

    <div class="container">
    	<order :orders="{{$orders}}"></order>
    </div>
@endsection