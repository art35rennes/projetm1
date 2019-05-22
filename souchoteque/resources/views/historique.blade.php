@extends('layout')


@section('customCss')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('body')
    <div class="container w-75">
        <h4 class="display-4 mb-3">Historique des modifications</h4>

        <table id="log" class="table table-bordered bg-white mt-3">
            <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Utilisateur</th>
                <th>Modification</th>
                <th class="edit"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($historique as $modif)
                <tr>
                    <td>{{$modif->date}}</td>
                    <td>{{$modif->type}}</td>
                    <td>{{$modif->name}}</td>
                    <td>{{$modif->old_value}}</td>
                    <td><i class="fas fa-history"></i></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

@section('customJs')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        $('#log').DataTable({
            "paging":   false,
            "info":     false,
            "language":{
                "search":"Rechercher",
                "emptyTable":"Aucune donnée à afficher",
            },
            "columnDefs": [
                { targets: 'edit', orderable: false }
            ]
        });
    </script>
@endsection