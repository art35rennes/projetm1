@extends('layout')
@section('body')
    <div class="container">
        <div class="alert @if(!$error) alert-success @else alert-danger @endif" role="alert">
            <h4 class="alert-heading">Feedback:</h4>
            <p>{{ $message }}</p>
            <hr>
            <p class="mb-0">
                {{$date}}
            </p>
        </div>
    </div>
@endsection