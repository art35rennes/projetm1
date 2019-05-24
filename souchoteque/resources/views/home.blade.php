@extends('layout')

@section('customCss')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('body')

    <div class="container mt-5 w-75">

        <table id="homeTable" class="table table-sm table-bordered  text-center">
            <thead>
            <tr>
                <th>Numéro&nbsp;de&nbsp;souche</th>
                <th>Identification</th>
                <th>Synthèse&nbsp;EPS</th>
                <th>Synthèse&nbsp;PHA</th>
                <th>Synthèse&nbsp;autre</th>
                <th>Numéro&nbsp;Pasteur</th>
                <th>Brevet</th>
                <th>Exclusivite</th>
                <th>Publication</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($souches as $souche)
                @if($souche->accreditation >= $user->souche)
                <tr>
                    <td>
                        <h4>
                            <a href="souche/{{$souche->ref}}" class="badge @if($souche->notogm) badge-info @else badge-warning @endif font-weight-normal">{{$souche->ref}}</a>
                        </h4>
                    </td>
                    <td class="font-italic @if(!$souche->identification) bg-danger text-white @endif">{{$souche->identification}}</td>
                    <td class="font-italic @if(!$souche->EPS) bg-danger text-white @endif">{{$souche->EPS}}</td>
                    <td class="font-italic @if(!$souche->PHA) bg-danger text-white @endif">{{$souche->PHA}}</td>
                    <td class="font-italic @if(!$souche->Autre) bg-danger text-white @endif">{{$souche->Autre}}</td>
                    <td class="font-italic @if(!$souche->pasteur) bg-danger text-white @endif">{{$souche->pasteur}}</td>
                    <td class="font-italic @if(!$souche->brevet) bg-danger text-white @endif">{{$souche->brevet}}</td>
                    <td class="font-italic @if(!$souche->exclusivite) bg-danger text-white @endif">{{$souche->exclusivite}}</td>
                    <td class="font-italic @if(!$souche->publication) bg-danger text-white @endif">{{$souche->publication}}</td>
                </tr>
                @endif
            @endforeach
            </tbody>
            <tfoot>
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
            </tfoot>
        </table>
    </div>
@endsection

@section('customJs')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        var table = $('#homeTable').DataTable( {
            "paging": false,
            "info": false,
            "searching": true,
            "language":{
                "search":"Rechercher",
                "emptyTable":"Aucune souche à afficher. Vous êtes pas <a href='/faq'>habilité</a> ou aucune donnée n'a été <a href='/faq'>référencé</a>",
            },
        } );
    </script>
@endsection