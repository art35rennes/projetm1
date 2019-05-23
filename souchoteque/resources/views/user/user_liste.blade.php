@extends('layout')
@section('customCss')

@endsection

@section('body')
    <div class="container">
        <h4 class="display-4">Liste des comptes utilisateur</h4>
        <form method="post" action="/user/maj" id="majForm">
            @csrf
            <table class="table">
                <thead>
                <tr>
                    <td>Nom</td>
                    <td>Mail</td>
                    <td>Accréditation</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($users["users"] as $u)
                    <tr>
                        <td><input type="text" readonly name="user[{{$u->id}}][name]" class="form-control-sm form-control" value="{{$u->name}}"></td>
                        <td><input type="email" readonly name="user[{{$u->id}}][email]" class="form-control-sm form-control" value="{{$u->email}}"></td>
                        <td>
                            <select name="user[{{$u->id}}][accreditation]" class="custom-select" disabled>
                                @foreach($accreditations["accreditation"] as $accred)
                                <option value="{{$accred->id}}" @if($accred->id == $u->accreditation) selected @endif>{{$accred->nom}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><i class="fas fa-pen "></i><i class="fas fa-check faForm"></i>
                        </td>
                        <td><a href="/user/recoverpassword/{{$u->id}}"><i class="fas fa-key"></i></a></td>
                        <td><a href="/user/suppr/{{$u->id}}"><i class="fas fa-trash"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </form>
    </div>
@endsection

@section('customJs')
    <script type="text/javascript" src="{{ URL::asset('js/user.js') }}"></script>
@endsection