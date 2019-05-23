@extends('layout')
@section('body')
    <div class="container">
        <div class="alert alert-{{$color}}" role="alert">
            <h4 class="alert-heading">Feedback:</h4>
            <strong>{{ $message }}</strong>
            <hr>
            <p class="mb-0">
                {{$date}}
            </p>
        </div>
    </div>
@endsection