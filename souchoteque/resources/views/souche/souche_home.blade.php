@extends('layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('body')
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <ul>
                @foreach($souche as $S => $s)
                    <li>
                        {{$S}}
                        <ul>
                            @foreach($s as $data => $d)
                                <li>
                                    {{$data}}
                                    <ul>
                                        @foreach($d as $key => $value)
                                            <li>{{$key}} : {{$value}}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Souche Tab
    </button>

    <div class="container-fluid w-75">
        <h4 class="display-4">Souche : <span id="ref" class="text-secondary">{{$souche['souche'][0]->ref}}</span></h4>

        <div class="custom-control custom-checkbox text-sm-right mt-2">
            <input type="checkbox" class="custom-control-input" id="editMode">
            <label class="custom-control-label" for="editMode">Mode Edition</label>
            <i class="fas fa-pen"></i>
            <small class="form-text text-muted editZone">N'oubliez pas d'enregistrer les modifications</small>
        </div>
        <button class="btn float-right m-2 btn-warning editZone" id="annulBtn">Annuler les modifications</button>
        <button class="btn float-right m-2 btn-success editZone" id="updateBtn">Valider les modifications</button><br>

        <div class="mt-5 m-3">
            <ul class="nav nav-pills mb-3 text-center" id="pills-tab" role="tablist">
                <li class="nav-item m-2">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-description" role="tab"
                       aria-controls="pills-description" aria-selected="true">description</a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-identification" role="tab"
                       aria-controls="pills-identification" aria-selected="false">identification</a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-pasteur" role="tab"
                       aria-controls="pills-pasteur" aria-selected="false">pasteur</a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-brevet" role="tab"
                       aria-controls="pills-brevet" aria-selected="false">brevets & Lettres Soleaux</a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-publication" role="tab"
                       aria-controls="pills-publication" aria-selected="false">publications</a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-exclisivite" role="tab"
                       aria-controls="pills-exclisivite" aria-selected="false">exclisivitées</a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-projet" role="tab"
                       aria-controls="pills-projet" aria-selected="false">projets</a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-eps" role="tab"
                       aria-controls="pills-eps" aria-selected="false">eps</a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-pha" role="tab"
                       aria-controls="pills-pha" aria-selected="false">pha</a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-autre" role="tab"
                       aria-controls="pills-autre" aria-selected="false">autre</a>
                </li>
            </ul>
            <div class="tab-content pt-2 pl-1" id="pills-tabContent">

                @include('souche.pills.description')

                @include('souche.pills.identification')

                @include('souche.pills.pasteur')

                @include('souche.pills.brevet')

                @include('souche.pills.publication')

                @include('souche.pills.exclusivite')

                @include('souche.pills.projet')

                @include('souche.pills.eps')

                @include('souche.pills.pha')

                @include('souche.pills.autre')
            </div>
        </div>
        @csrf

    </div>

    <div class="container" id="server-results">

    </div>
@endsection

@section('customJs')
<script type="text/javascript" src="{{ URL::asset('js/souche.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/ajax.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
@endsection