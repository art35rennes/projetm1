@extends('layout')
@section('customCss')

@endsection

@section('body')
    <div class="container bg-light">
        @if (isset($erreur))
            <div class="alert alert-primary" role="alert">
                {{ $erreur }}
            </div>
        @endif

        <form class="m-3" method="POST" action="/user/ajout">
            @csrf

            <h4 class="display-4 mb-3">Ajout utilisateur</h4>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h6 for="email">Email <span class="text-muted font-italic font-weight-light">(Polymaris uniquement)</span></h6>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <h6 for="password">Mot de passe</h6>
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="insert-password" placeholder="Mot de passe" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <h6 for="password-confirm">Confirmer le mot de passe</h6>
                    <input type="password" class="form-control" name="password-confirm" id="insert-password-confirm" placeholder="Mot de passe" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <h6 for="name">Nom</h6>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nom" required>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="mt-3 pt-3 row">
                <div class="form-group col-md-4 mt-2">
                    <h6 for="souche">Accréditation</h6>
                    <select name="souche" class="form-control mb-3">
                        @foreach($accreditations['accreditation'] as $accreditation)
                        <option value="{{$accreditation->id}}">{{$accreditation->nom}}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <button type="submit" id="insert-submit" class="btn btn-primary mb-3">Ajouter</button>
        </form>
    </div>
@endsection

@section('customJs')

@endsection