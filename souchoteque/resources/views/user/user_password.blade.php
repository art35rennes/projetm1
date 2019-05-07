@extends('layout')
@section('customCss')

@endsection

@section('body')
    <div class="container-fluid w-75 bg-light">
        <h4 class="display-4 mb-3">Récupération de mot de passe</h4>
        @foreach($users as $user)
            @foreach($user as $us)
                <form method="post" action="/user/recoverpassword/{{$us->id}}">
                    <h5>Utilisateur aillant perdu son mot de passe : {{$us->name}}</h5>
                    <h6 for="password">Nouveau mot de passe</h6>
                    <input type="password" name="password"/>
                    <h6 for="password-confirm">Confirmer le mot de passe</h6>
                    <input type="password" name="password-confirm"/>
                    <button type="submit" class="btn btn-success">Valider</button>
                    @csrf
                </form>
            @endforeach
        @endforeach
    </div>
@endsection

@section('customJs')
    <script type="text/javascript" src="{{ URL::asset('js/user.js') }}"></script>
@endsection