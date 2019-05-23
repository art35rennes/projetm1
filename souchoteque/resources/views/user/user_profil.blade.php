@extends('layout')
@section('customCss')

@endsection

@section('body')
    <div class="container-fluid w-75 bg-light">
        @foreach($userss as $users)
            @foreach($users as $u)
                <h4 class="display-4 mb-3">Profil de {{$u->name}}</h4>
                <form method="post" action="/user/profil" id="majForm">
                    @csrf
                    <input type="number" hidden="true" name="id" value="{{$u->id}}">
                    <div class="form-group">
                        <label for="user[name]">Nom d'utilisateur</label>
                        <input type="text" class="form-control" name="user[name]" value="{{$u->name}}">
                    </div>
                    <div class="form-group">
                        <label for="user[email]">Adresse email</label>
                        <input type="email" class="form-control" name="user[email]" value="{{$u->email}}" aria-describedby="emailHelp">
                    </div>
                    <h4>Changer de mot de passe</h4>
                    <div class="form-group">
                        <label for="password-old">Ancien mot de passe</label>
                        <input type="password" class="form-control" name="password-old">
                    </div>
                    <div class="form-group">
                        <label for="password">Nouveau mot de passe</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirmez le mot de passe</label>
                        <input type="password" class="form-control" name="password-confirm">
                    </div>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                </form>
            @endforeach
        @endforeach
    </div>
@endsection

@section('customJs')
    <script type="text/javascript" src="{{ URL::asset('js/user.js') }}"></script>
@endsection