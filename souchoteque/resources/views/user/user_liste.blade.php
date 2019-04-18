@extends('layout')
@section('customCss')

@endsection

@section('body')
    <div class="container">
        <h4 class="display-4">Liste des comptes utilisateur</h4>
        <table class="table">
            <thead>
            <tr>
                <td>Nom</td>
                <td>Mail</td>
                <td>Accréditation</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($users["users"] as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <select class="custom-select" disabled>
                            @foreach($accreditations["accreditation"] as $accred)
                            <option value="{{$accred->nom}}" @if($accred->id == $user->accreditation) selected @endif>{{$accred->nom}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><i class="fas fa-pen "></i></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('customJs')
    <script type="text/javascript" src="{{ URL::asset('js/user.js') }}"></script>
@endsection