@extends('layout')
@section('body')
    <div class="container">
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Feedback:</h4>
            <p>{{ $message }}</p>
            <hr>
            <p class="mb-0">
                YYYY-MM-DD HH:MM:SS
            </p>
        </div>
    </div>
@endsection