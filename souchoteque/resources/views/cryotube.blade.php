@extends('layout')

@section('customCss')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('body')

    <div class="container w-75 mt-3">
        @csrf
        <table class="table table-bordered" id="cryotube">
            <thead>
            <th>Souche</th>
            <th>Pasteur</th>
            <th>Stock</th>
            <th class="edit"></th>
            </thead>
            <tbody>
            @foreach($data as $key => $souche)
                <tr>
                    <td class="text-center">
                        <h4>
                            <a href="souche/{{$key}}" class="reference badge @if($souche['notogm']) badge-info @else badge-warning @endif font-weight-normal">{{$key}}</a>
                        </h4>
                    </td>
                    <td class="text-right font-italic"><span class="numero">Polymaris</span></td>
                    <td class="text-right">{{$souche['stock']}}</td>
                    <td class="text-center">
                        <i class="cryoStock fas fa-minus"></i>
                        <i class="cryoStock fas fa-plus ml-2"></i>
                    </td>
                </tr>
                @isset($souche['pasteur'])
                    @foreach($souche['pasteur'] as $pasteur)
                        <tr class="text-center">
                            <td>
                                <h4>
                                    <span class="reference badge @if($souche['notogm']) badge-info @else badge-warning @endif font-weight-normal">{{$key}}</span>
                                </h4>
                            </td>
                            <td class="text-right"><span class="numero">{{$pasteur['numero']}}</span></td>
                            <td class="text-right">{{$pasteur['stock']}}</td>
                            <td class="text-center">
                                <i class="cryoStock fas fa-minus"></i>
                                <i class="cryoStock fas fa-plus ml-2"></i>
                            </td>
                        </tr>
                    @endforeach
                @endisset
            @endforeach
            </tbody>
        </table>
    </div>


@endsection

@section('customJs')
    <script type="text/javascript" src="{{ URL::asset('js/ajax.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        var table = $('#cryotube').DataTable( {
            "paging": false,
            "info": false,
            "searching": true,
            "language":{
                "search":"Rechercher",
                "emptyTable":"Aucune souche à afficher. Vous êtes pas <a href='/faq'>habilité</a> ou aucune donnée n'a été <a href='/faq'>référencé</a>",
            },
            "columnDefs": [
                { targets: 'edit', orderable: false }
            ]
        } );
    </script>
@endsection