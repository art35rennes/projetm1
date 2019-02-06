@extends('layout')

@section('body')
    <br>

    <div class="container">
        <form class="form-inline">
            <div class="input-group input-group-sm mt-3 font-weight-lighter">

                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Numéro&nbsp;</span>
                </div>
                <input type="text" class="form-control" aria-label="" aria-describedby="">

                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Identification&nbsp;</span>
                </div>
                <select class="form-control" id="">
                    <option>Oui</option>
                    <option>Non</option>
                </select>

                <div class="input-group-prepend">
                    <span class="input-group-text" id="">EPS&nbsp;</span>
                </div>
                <select class="form-control" id="">
                    <option>Oui</option>
                    <option>Non</option>
                </select>

                <div class="input-group-prepend">
                    <span class="input-group-text" id="">PHA&nbsp;</span>
                </div>
                <select class="form-control" id="">
                    <option>Oui</option>
                    <option>Non</option>
                </select>

                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Autre&nbsp;</span>
                </div>
                <select class="form-control" id="">
                    <option>Oui</option>
                    <option>Non</option>
                </select>

                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Pasteur&nbsp;</span>
                </div>
                <input type="text" class="form-control" aria-label="" aria-describedby="">

                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Brevet&nbsp;</span>
                </div>
                <select class="form-control" id="">
                    <option>Oui</option>
                    <option>Non</option>
                </select>

                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Licence&nbsp;</span>
                </div>
                <select class="form-control" id="">
                    <option>Oui</option>
                    <option>Non</option>
                </select>

                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Publication&nbsp;</span>
                </div>
                <select class="form-control" id="">
                    <option>Oui</option>
                    <option>Non</option>
                </select>

                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="">Filtrer</button>
                </div>
            </div>
        </form>
    </div>

    <br>
    <div class="container">
        <table class="table text-center">
            <tbody>
                <tr>
                    <th>Numéro de souche</th>
                    <th>Identification</th>
                    <th>Synthèse EPS</th>
                    <th>Synthèse PHA</th>
                    <th>Synthèse autre</th>
                    <th>Numéro Pasteur</th>
                    <th>Brevet</th>
                    <th>Licence</th>
                    <th>Publication</th>
                </tr>
                @foreach ($souches as $souche)
                    <tr>
                        <td><a href="souche/{{$souche['ref']}}" class="badge badge-info">{{$souche['ref']}}</a></td>
                        <td class="bg-danger">{{$souche['identification']}}</td>
                        <td class="bg-danger">{{$souche['EPS']}}</td>
                        <td class="bg-danger">{{$souche['PHA']}}</td>
                        <td class="bg-danger">{{$souche['Autre']}}</td>
                        <td class="bg-danger">{{$souche['pasteur']}}</td>
                        <td class="bg-danger">{{$souche['brevet']}}</td>
                        <td class="bg-danger"></td>
                        <td class="bg-danger">{{$souche['publication']}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td><a href="#" class="badge badge-info">1024</a></td>
                    <td class="bg-danger">&nbsp;</td>
                    <td class="bg-danger">&nbsp;</td>
                    <td class="bg-danger">&nbsp;</td>
                    <td class="bg-danger">&nbsp;</td>
                    <td class="bg-danger">&nbsp;</td>
                    <td class="bg-danger">&nbsp;</td>
                    <td class="bg-danger">&nbsp;</td>
                    <td class="bg-danger">&nbsp;</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection