@extends('layout')
@section('customCss')

@endsection

@section('body')
    <div class="container-fluid w-75 bg-light">
        @foreach($userss as $users)
            @foreach($users as $user)
                <h4 class="display-4 mb-3">Profil de {{$user->name}}</h4>
                <form method="post" action="/user/maj" id="majForm">
                    @csrf

                </form>
            @endforeach
        @endforeach
    </div>
@endsection

@section('customJs')
    <script type="text/javascript" src="{{ URL::asset('js/user.js') }}"></script>
@endsection