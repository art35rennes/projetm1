@extends('layout')
@section('customCss')

@endsection

@section('body')
    <div class="container-fluid w-75 bg-light">
        <h4 class="display-4 mb-3">Récupération de mot de passe</h4>
        @foreach($users as $user)
            @foreach($user as $us)
                <form method="post" action="/user/recoverpassword/{{$us->id}}">
                    <h4>Utilisateur aillant perdu son mot de passe : {{$us->name}}</h4>
                    <div class="form-group">
                        <label for="password">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirmez le mot de passe</label>
                        <input type="password" class="form-control" id="password-confirm">
                    </div>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    @csrf
                </form>
            @endforeach
        @endforeach
    </div>
@endsection

@section('customJs')
    <script type="text/javascript" src="{{ URL::asset('js/user.js') }}"></script>
@endsection