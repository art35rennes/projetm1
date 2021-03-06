@extends('layout')

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

    <form enctype="multipart/form-data" method="post" action="{{$souche['souche'][0]->ref}}/maj" id="majForm">
        <div class="mt-3 container bg-light pb-3">
            <h4 class="display-4">Souche n°{{ $souche['souche'][0]->ref}}</h4>
            <div class="custom-control custom-checkbox text-sm-right mb-2">
                <input type="checkbox" class="custom-control-input" id="editMode">
                <label class="custom-control-label" for="editMode">Mode Edition</label>
                <i class="fas fa-pen"></i>
            </div>
            <div class="row">
                <!-- Colonne Gauche -->
                <div class="col-xl-4">
                    <br>
                    <div class="card" >
                        <div id="carouselSouche" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                            @foreach($souche['photo_souche'] as $photo)
                                <li data-target="#carouselSouche" data-slide-to="{{$loop->index}}" @if($loop->index==0) class="active" @endif></li>
                            @endforeach
                            </ol>
                            <div class="carousel-inner">
                            @foreach($souche['photo_souche'] as $photo)
                                <div class="carousel-item @if($loop->index==0) active @endif">
                                    <img src="/storage/{{$photo->fichier}}" class="d-block w-100">
                                </div>
                            @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselSouche" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Précédent</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselSouche" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Suivant</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title border border-warning">Souche sur pétrie</h5>
                            <p class="card-text border border-warning">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec nunc commodo, mollis ligula volutpat, eleifend mauris. Quisque et dui pretium, pharetra mauris nec, elementum ipsum. Pellentesque nulla mauris, sollicitudin in bibendum sed, convallis ac ex. Maecenas consequat lectus ac.
                            </p>

                            @isset($souche['souche'][0])<a href="{{asset("/storage/".$souche['souche'][0]->description)}}" class="font-italic"></i> {{$souche['souche'][0]->description}}</a><i class="editButton fas fa-times deleteCross ml-2"></i>@endisset
                            <p>
                                <span class="h6">Stock Cryotubes:&nbsp;</span>
                                <span class="badge badge-primary" title="Stock Polymaris">{{$souche['souche'][0]->stock}}</span>
                                @foreach($souche['pasteur'] as $p)
                                    <span class="badge badge-secondary" title="Stock Pasteur n°{{$p->numero}}">{{$p->stock}}</span>
                                @endforeach
                            </p>

                        </div>
                    </div>
                    <br>
                </div>

                <!-- Colonne Droite -->
                <div class="col-xl-8">
                    <div class="accordion mt-3" id="accordionMenu">

                        <!-- Origine -->
                        <div class="card">
                            <div class="card-header" id="headingOrigine">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOrigine" aria-expanded="true" aria-controls="collapseOrigine">
                                        Origine
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOrigine" class="collapse" aria-labelledby="headingOrigine" data-parent="#accordionMenu">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Colonne gauche-->
                                        <div class="col-md-7">
                                            <br>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Lieu d'origine</span>
                                                </div>
                                                @isset($souche['souche'][0])<input type="text" class="form-control" readonly value="{{$souche['souche'][0]->origine}}" name="souche/origine">@endisset
                                                <div class="input-group-append editZone">
                                                    <span class="input-group-text">
                                                        <i class="editButton fas fa-lock unlockEdit"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Année de collecte</span>
                                                </div>
                                                @isset($souche['souche'][0])<input type="number" class="form-control" size="4" readonly value="{{$souche['souche'][0]->annee_collecte}}" name="souche/annee_collecte">@endisset
                                                <div class="input-group-append  editZone">
                                                    <span class="input-group-text">
                                                        <i class="editButton fas fa-lock unlockEdit"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            @isset($souche['souche'][0])<a href="{{asset("/storage/".$souche['souche'][0]->description)}}" class="font-italic">{{$souche['souche'][0]->description}}</a>&nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>@endisset

                                            <hr>

                                            <div class="input-group mb-3" id="ogm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="">OGM&nbsp;</span>
                                                </div>
                                                <select class="form-control col-sm-3 showSelect" id="isOgm" disabled>
                                                    <option @if($souche['souche'][0]->annee_creation) selected @endif>Oui</option>
                                                    <option @if(!$souche['souche'][0]->annee_creation) selected @endif>Non</option>
                                                </select>
                                                <div class="input-group-append editZone">
                                                <span class="input-group-text">
                                                    <i class="editButton fas fa-lock unlockEdit"></i>
                                                </span>
                                                </div>
                                            </div>

                                            <div id="ogmPlus">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Année de création</span>
                                                    </div>
                                                    @isset($souche['souche'][0])<input type="text" size="4" class="form-control" readonly value="{{$souche['souche'][0]->annee_creation}}" name="souche/annee_creation">@endisset
                                                    <div class="input-group-append editZone">
                                                        <span class="input-group-text">
                                                            <i class="editButton fas fa-lock unlockEdit"></i>
                                                        </span>
                                                    </div>
                                                </div>

                                                @if($souche['souche'][0]->validation_hcb)
                                                    <a href="{{asset("/storage/".$souche['souche'][0]->validation_hcb)}}" class="font-italic"><i class="mt-3 fas fa-file-alt text-danger"></i> validation_hcb.pdf</a>&nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                                @endif
                                                @if($souche['souche'][0]->texte_hcb)
                                                    <a href="{{asset("/storage/".$souche['souche'][0]->texte_hcb)}}" class="font-italic"><i class="mb-3 fas fa-file-alt text-danger"></i> texte_hcb.pdf</a>&nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>
                                                @endif

                                                <div class="input-group mb-3 editZone" id="hcbAdd">
                                                    <div class="input-group-prepend">
                                                        <select class="form-control" id="souche/hcb/type" name="souche/hcb/type">
                                                            <option value="texte_hcb">Texte HCB</option>
                                                            <option value="validation_hcb">Autorisation</option>
                                                            <option value="schema_plasmique">Schéma plasmique</option>
                                                        </select>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="souche/hcb" name="souche/hcb/doc">
                                                        <label class="custom-file-label" for="souche/hcb">Ajouter un fichier</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="editButton fas fa-plus faForm"></i>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Colonne droite-->
                                        <div class="col-md-5">
                                            <div id="carouselLieu" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    @foreach($souche['photo_souche'] as $photo)
                                                    <li data-target="#carouselLieu" data-slide-to="{{$loop->index}}" @if($loop->index==0) class="active" @endif></li>
                                                    @endforeach
                                                </ol>
                                                <div class="carousel-inner">
                                                    @foreach($souche['photo_souche'] as $photo)
                                                    <div class="carousel-item @if($loop->index==0) active @endif">
                                                        <img src="/storage/{{$photo->fichier}}" class="d-block w-100">
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <p class="small bg-secondary">{{$photo->description}}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselLieu" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Précédent</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselLieu" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Suivant</span>
                                                </a>
                                            </div>

                                            <div class="input-group mb-3 mt-1 editZone border border-info border-bottom-0">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="description/image" name="photo_souche/fichier">
                                                    <label class="custom-file-label" for="photo_souche/fichier" data-browse="A">Ajouter une image</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="editButton fas fa-plus faForm"></i>
                                                    </span>
                                                </div>
                                                <textarea class="input-group border border-info border-top-0" name="photo_souche/description" placeholder="description photo..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="card">
                            <div class="card-header" id="headingDescription">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseDescription" aria-expanded="false" aria-controls="collapseDescription">
                                        Description
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseDescription" class="collapse" aria-labelledby="headingDescription" data-parent="#accordionMenu">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Gauche -->
                                        <div class="col-xl-7">
                                            @foreach($souche['description'] as $file)
                                            <p><a href="{{asset("/storage/".$file->fichier)}}" class="font-italic">{{$file->texte}}</a><i class="editButton fas fa-times deleteCross ml-2"></i></p>
                                            @endforeach
                                        </div>
                                        <!-- Droite -->
                                        <div class="col-xl-5">
                                            <div id="carouselBoite" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    @foreach($souche['photo_souche'] as $photo)
                                                    <li data-target="#carouselBoite" data-slide-to="0" @if($loop->iteration==1) class="active" @endif></li>
                                                    @endforeach
                                                </ol>
                                                <div class="carousel-inner">
                                                    @foreach($souche['photo_souche'] as $photo)
                                                    <div class="carousel-item @if($loop->iteration==1) active @endif">
                                                        <img src="{{$photo->fichier}}" class="d-block w-100">
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <h5>{{$photo->fichier}}</h5>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselBoite" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Précédent</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselBoite" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Suivant</span>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Bas -->
                                        <div class="input-group mb-3 mt-3 col-md-9 editZone">
                                            <div class="input-group-prepend">
                                                <input type="text" list="dataDescription" placeholder="Nom..." class="form-control" name="description/texte">
                                                <datalist id="dataDescription">
                                                    <option>Photo sur boite</option>
                                                    <option>Photo microscopie</option>
                                                    <option>Description</option>
                                                    <option>Coloration Gram</option>
                                                    <option>Galerie API</option>
                                                    <option>Galerie Biolog</option>
                                                    @foreach($souche['description'] as $file)
                                                    <option>{{$file->texte}}</option>
                                                    @endforeach
                                                </datalist>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="description/file" name="description/fichier">
                                                <label class="custom-file-label" for="description/file"></label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="editButton fas fa-plus faForm"></i>
                                                </span>
                                            </div>
                                            <i class='fas fa-check faForm m-2'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Identification -->
                        <div class="card">
                            <div class="card-header" id="headingIdentification">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseIdentification" aria-expanded="false" aria-controls="collapseIdentification">
                                        Identification
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseIdentification" class="collapse" aria-labelledby="headingIdentification" data-parent="#accordionMenu">
                                <div class="card-body">
                                    <table class="table text-center">
                                        <tbody>
                                        <tr>
                                            <th style="width: 3%">#</th>
                                            <th>Type</th>
                                            <th>Sequence</th>
                                            <th>Arbre Phylogénétique</th>
                                        </tr>
                                        @foreach($souche['identification'] as $id)
                                        <tr>
                                            <td><span>{{$loop->iteration}}</span></td>
                                            <td class="1"><p>{{$id->type}}</p></td>
                                            <td class="2">
                                                <a href="{{asset("/storage/".$id->sequence)}}" class="font-italic">{{$id->sequence}}</a>
                                                <i class="editButton fas fa-times deleteCross ml-2"></i>
                                            </td>
                                            <td class="3">
                                                <a href="{{asset("/storage/".$id->arbre)}}" class="font-italic">{{$id->arbre}}</a>
                                                <i class="editButton fas fa-times deleteCross ml-2"></i>
                                            </td>
                                            <td class="4">
                                                <i class="editButton fas fa-pen"></i>
                                                <i class='fas fa-check checkPostRow'></i>
                                                <i class='fas fa-check checkPostRow'></i>
                                            </td>
                                        </tr>
                                        @endforeach

                                        <tr class="editZone">
                                            <td>&nbsp;</td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control border border-info" list="dataIdentification" placeholder="Type..." name="identification/0/type" isKey="true">
                                                    <datalist id="dataIdentification">
                                                    @foreach($souche['identification'] as $id)
                                                        <option>{{$id->type}}</option>
                                                    @endforeach
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file text-left">
                                                    <label class="btn btn-default border border-info rounded">
                                                        Parcourir <input type="file" name="identification/0/sequence" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file text-left">
                                                    <label class="btn btn-default border border-info rounded">
                                                        Parcourir <input type="file" name="identification/0/arbre" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-check faForm"></i>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Pasteur -->
                        <div class="card border border-success">
                            <div class="card-header" id="headingPasteur">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsePasteur" aria-expanded="false" aria-controls="collapsePasteur">
                                        Pasteur
                                    </button>
                                </h2>
                            </div>
                            <div id="collapsePasteur" class="collapse" aria-labelledby="headingPasteur" data-parent="#accordionMenu">
                                <div class="card-body">
                                    <p class="lead font-italic">Cliquer sur les lignes pour plus d'info</p>
                                    <table class="table text-center table-hover table-sm">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Dépot</th>
                                                <th>Titre</th>
                                                <th>Numéro</th>
                                                <th>Dossier</th>
                                                <th>Validation</th>
                                                <th>Stock</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            <tr class="accordion-toggle"  data-toggle="collapse" data-target="#collapseRow1">
                                                @foreach($souche['pasteur'] as $p)
                                                    <td data-toggle="collapse" data-target="collapseRow1">
                                                        <span>{{$loop->index+1}}</span>
                                                    </td>
                                                    <td>
                                                        <p>{{$p->date_depot}}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{$p->titre}}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{$p->numero}}</p>
                                                    </td>
                                                    <td>
                                                        <a href="{{asset("/storage/".$p->dossier_depot)}}" class="font-italic"> dépot</a>
                                                        <i class="editButton fas fa-times deleteCross ml-1"></i>
                                                    </td>
                                                    <td>
                                                        <a href="{{asset("/storage/".$p->scan_validation)}}" class="font-italic"> validation</a>
                                                        <i class="editButton fas fa-times deleteCross ml-1"></i>
                                                    </td>
                                                    <td>
                                                        <p>{{$p->stock}}</p>
                                                    </td>
                                                    <td>
                                                        <i class="editButton fas fa-pen"></i>
                                                        <i class='fas fa-check checkPostRow'></i>
                                                    </td>
                                            <tr id="collapseRow1" class="collapse in">
                                                <td colspan="2">
                                                    <img class="border-warning border" width="70%" src="https://via.placeholder.com/250">
                                                </td>

                                            </tr>
                                            </tr>
                                            @endforeach

                                            <tr class="editZone">
                                                <td>&nbsp;</td>
                                                <td>
                                                    <div>
                                                        <input type="texte" class="form-control border border-info" name="pasteur/0/date_depot" placeholder="yyyy-mm-dd" pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input type="texte" class="form-control border border-info" name="pasteur/0/titre" isKey="true">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input type="text" class="form-control input-group border border-info" name="pasteur/0/numero">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-file text-left">
                                                        <label class="btn btn-default border border-info rounded">
                                                            Parcourir <input type="file" name="pasteur/0/dossier_depot" hidden>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-file text-left">
                                                        <label class="btn btn-default border border-light rounded">
                                                            Parcourir <input type="file" name="pasteur/0/scan_validation" hidden>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input type="text" class="form-control border border-info" name="pasteur/0/stock">
                                                    </div>
                                                </td>
                                                <td>
                                                    <i class="editButton fas fa-check faForm"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Brevets -->
                        <div class="card">
                            <div class="card-header" id="headingBrevets">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseBrevets" aria-expanded="false" aria-controls="collapseBrevets">
                                        Brevets / Soleau
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseBrevets" class="collapse" aria-labelledby="headingBrevets" data-parent="#accordionMenu">
                                <div class="card-body">
                                    <table class="table table-sm text-center">
                                        <tbody>
                                        <tr>
                                            <th style="width: 5%;">Numero</th>
                                            <th style="width: 3%;">Titre</th>
                                            <th style="width: 15%;">Type</th>
                                            <th style="width: 17.5%;">Demande</th>
                                            <th style="width: 17.5%;">Secteur</th>
                                            <th style="width: 20%;">Texte</th>
                                            <th style="width: 20%;">INPI</th>
                                            <th style="width: 2%;">&nbsp;</th>
                                        </tr>
                                        @foreach($souche['brevet_soleau'] as $brevet)
                                        <tr>
                                            <td>
                                                <p>{{$brevet->numero}}</p>
                                            </td>
                                            <td>
                                                <p>{{$brevet->titre}}</p>
                                            </td>
                                            <td>
                                                <span>@if($brevet->inpi==null) Brevet @else Soleau @endif</span>
                                            </td>
                                            <td>
                                                <p>{{$brevet->date}}</p>
                                            </td>
                                            <td>
                                                <p>{{$brevet->activite}}</p>
                                            </td>
                                            <td>
                                                @if($brevet->scan!="")
                                                <a href="{{asset("/storage/".$brevet->scan)}}" class="font-italic">{{$brevet->scan}}</a>
                                                <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($brevet->inpi!="")
                                                <a href="{{asset("/storage/".$brevet->inpi)}}" class="font-italic">{{$brevet->inpi}}</a>
                                                <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-pen"></i>
                                                <i class='fas fa-check checkPostRow'></i>
                                            </td>
                                        </tr>
                                        @endforeach

                                        <tr class="editZone">
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control form-control-sm border border-info" name="brevet_soleau/0/numero">
                                                </div>
                                            </td>
                                            <td colspan="2">
                                                <div>
                                                    <input type="text" class="form-control form-control-sm input-group border border-info" name="brevet_soleau/0/titre" isKey="true" placeholder="Titre">
                                                </div>
                                            </td>
                                            <td class="d-none">

                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control form-control-sm input-group border border-info" name="brevet_soleau/0/date" placeholder="yyyy-mm-dd" pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control form-control-sm input-group border border-info" list="dataSecteur" name="brevet_soleau/0/activite">
                                                    <datalist id="dataSecteur">
                                                        <option>Cosmétique</option>
                                                        <option>Médicale</option>
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file text-left form-control-sm">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="brevet_soleau/0/scan" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file text-left form-control-sm">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="brevet_soleau/0/inpi" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-check faForm"></i>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Publication -->
                        <div class="card">
                            <div class="card-header" id="headingPublication">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsePublication" aria-expanded="false" aria-controls="collapsePublication">
                                        Publication
                                    </button>
                                </h2>
                            </div>
                            <div id="collapsePublication" class="collapse" aria-labelledby="headingPublication" data-parent="#accordionMenu">
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th colspan="2">Document</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        @foreach($souche['publication'] as $p)
                                            <tr>
                                                <td><span>{{$loop->index+1}}</span></td>
                                                <td><p>{{$p->date}}</p>
                                                <td class="d-none"><p>{{$p->nom}}</p></td>
                                                <td colspan="2">
                                                    <a href="{{asset("/storage/".$p->fichier)}}" class="font-italic"> {{$p->nom}}</a>
                                                    &nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>
                                                </td>
                                                <td>
                                                    <i class="editButton fas fa-pen"></i>
                                                    <i class='fas fa-check checkPostRow'></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="editZone">
                                            <td>&nbsp;</td>
                                            <td>
                                                <div>
                                                    <input class="form-control border border-info" type="date" name="publication/0/date">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control border border-info" placeholder="Nom" type="texte" name="publication/0/nom" isKey="true">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    <label class="btn btn-default border border-info rounded">
                                                        Parcourir <input type="file" name="publication/0/fichier" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-check faForm"></i>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Exclusivité -->
                        <div class="card">
                            <div class="card-header" id="headingExclusivite">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseExclusivite" aria-expanded="false" aria-controls="collapseExclusivite">
                                        Exclusivité
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseExclusivite" class="collapse" aria-labelledby="headingExclusivite" data-parent="#accordionMenu">
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>#</th>
                                            <th>Début</th>
                                            <th>Fin</th>
                                            <th>Partenaire</th>
                                            <th>Secteur</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        @foreach($souche['exclusivite'] as $exclu)
                                        <tr>
                                            <td><p>{{$exclu->id}}</p></td>
                                            <td><p>{{$exclu->date_debut}}</p></td>
                                            <td><p>{{$exclu->date_fin}}</p></td>
                                            <td><p>{{$exclu->partenaire}}</p></td>
                                            <td><p>{{$exclu->activite}}</p></td>
                                            <td>
                                                <i class="editButton fas fa-pen"></i>
                                                <i class='fas fa-check checkPostRow'></i>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr class="editZone">
                                            <td>
                                                <div>
                                                    <input class="form-control border border-info" type="text" name="exclusivite/0/id">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control border border-info" placeholder="yyyy-mm-dd" pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))" type="text" name="exclusivite/0/date_debut">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control border border-info" placeholder="yyyy-mm-dd" pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))" type="text" name="exclusivite/0/date_fin">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control border border-info" type="text" list="dataPart" name="exclusivite/0/partenaire">
                                                    <datalist id="dataPart">
                                                        <option>EDF</option>
                                                        <option>L'oréal</option>
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control border border-info" type="text" class="input-group" list="dataSecteur" name="exclusivite/0/activite">
                                                    <datalist id="dataSecteur">
                                                        <option>Cosmétique</option>
                                                        <option>Médicale</option>
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-check faForm"></i>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Projet -->
                        <div class="card">
                            <div class="card-header" id="headingProjet">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseProjet" aria-expanded="false" aria-controls="collapseProjet">
                                        Projet
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseProjet" class="collapse" aria-labelledby="headingProjet" data-parent="#accordionMenu">
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Date</th>
                                            <th>Partenaire</th>
                                            <th>Secteur</th>
                                            <th>Document</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        @foreach($souche['projet_souche'] as $projet)
                                        <tr>
                                            <td><span>{{$loop->iteration}}</span></td>
                                            <td><p>{{$projet->nom}}</p></td>
                                            <td><p>{{$projet->date}}</p></td>
                                            <td><p>{{$projet->partenaire}}</p></td>
                                            <td><p>{{$projet->activite}}</p></td>
                                            <td>
                                                <a href="{{asset("/storage/".$projet->texte)}}" class="font-italic">{{$projet->texte}}</a>
                                                <i class="editButton fas fa-times deleteCross ml-2"></i>
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-pen"></i>
                                                <i class='fas fa-check checkPostRow'></i>
                                            </td>
                                        </tr>
                                        @endforeach

                                        <tr class="editZone">
                                            <td>&nbsp;</td>
                                            <td>
                                                <div>
                                                    <input class="form-control border border-info" type="text" name="projet/0/nom" isKey="true">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control border border-info" placeholder="yyyy-mm-dd" pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))" type="text" name="projet/0/date">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control border border-info" type="text" list="dataPart" name="projet/0/partenaire">
                                                    <datalist id="dataPart">
                                                        <option>EDF</option>
                                                        <option>L'oréal</option>
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control border border-info" type="text" class="input-group" list="dataSecteur" name="projet/0/ativite">
                                                    <datalist id="dataSecteur">
                                                        <option>Cosmétique</option>
                                                        <option>Médicale</option>
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file text-left">
                                                    <label class="btn btn-default border border-info rounded">
                                                        Parcourir <input type="file" name="projet/0/texte" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-check faForm"></i>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

            <div class="accordion mt-3 mb-3" id="accordionType">

                <!-- EPS -->
                <div class="card">
                    <div class="card-header" id="headingEps">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEps" aria-expanded="false" aria-controls="collapseEps">
                                Synthèse Eps
                            </button>
                        </h2>
                    </div>
                    <div id="collapseEps" class="collapse" aria-labelledby="headingEps" data-parent="#accordionType">
                        <div class="card-body">
                            <div>

                            <!--Projet-->
                                <div class="p-3 d-block" id="ProjetEps">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
                                        @foreach($souche['projet_souche'] as $projet)
                                            <li class="list-inline-item"><a href="{{asset("/storage/".$projet->texte)}}" class="font-italic"></a></li>
                                        @endforeach
                                        <li class="list-inline-item editZone">
                                            <input class="form-control w-75 d-inline" type="text" list="dataProjet" name="eps/projet">
                                            <datalist id="dataProjet">
                                            @foreach($souche['projet'] as $projet)
                                                <option>{{$projet->nom}}</option>
                                            @endforeach
                                            </datalist>
                                            <i class="editButton fas fa-check ml-1"></i>
                                        </li>
                                    </ul>
                                    <hr class="w-50" align="left">
                                </div>

                            <!-- Carac -->
                            @foreach($souche['caracterisation'] as $carac)
                            @if($carac->type=="EPS")
                                <div class="CaracterisationEps p-3 d-block">
                                    <h4>Caractérisation n°{{$loop->iteration}}</h4>
                                    <hr class="w-50" align="left">
                                    <h6>Poid moléculaire: <span class="font-weight-light">{{$carac->poids_moleculaire }}</span></h6>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4 font-italic">
                                                    <h6>Oses neutres :</h6>
                                                    <div class="button-group d-inline-block">
                                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle editZone" data-toggle="dropdown">Ajouter...</button>
                                                        <ul class="dropdown-menu p-3 pre-scrollable">
                                                            <li>
                                                                <input class="form-control w-75" type="text" placeholder="Ajouter Oses..." name="eps/oses_new/neutre">
                                                            </li>
                                                            @foreach($souche['oses'] as $oses)
                                                            @if($oses->type == "neutre")
                                                            <li>
                                                                <label class="p-1">{{$oses->nom}}</label>
                                                                <input type="checkbox" name="eps/oses/neutre">
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <i class="editButton fas fa-plus faForm"></i>

                                                    <ul class="list-unstyled mt-2">
                                                        @foreach($souche['caracterisation_oses'] as $oses)
                                                        @if($oses->type=="neutre")
                                                        <li><p href="{{asset("/storage/".$oses->oses)}}" class="d-inline">{{$oses->oses}}</p><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 font-italic">
                                                    <h6>Oses acides :</h6>
                                                    <div class="button-group d-inline-block">
                                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle editZone" data-toggle="dropdown">Ajouter...</button>
                                                        <ul class="dropdown-menu p-3 pre-scrollable">
                                                            <li>
                                                                <input class="form-control w-75" type="text" name="eps/oses_new/acide">
                                                            </li>
                                                            @foreach($souche['oses'] as $oses)
                                                            @if($oses->type == "acide")
                                                            <li>
                                                                <label class="p-1">{{$oses->nom}}</label>
                                                                <input type="checkbox" name="eps/oses/acide">
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <i class="editButton fas fa-plus faForm"></i>

                                                    <ul class="list-unstyled mt-3">
                                                        @foreach($souche['caracterisation_oses'] as $oses)
                                                        @if($oses->type=="acide")
                                                        <li><p href="{{asset("/storage/".$oses->oses)}}" class="d-inline">{{$oses->oses}}</p><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 font-italic">
                                                    <h6>Osamines :</h6>
                                                    <div class="button-group d-inline-block">
                                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle editZone" data-toggle="dropdown">Ajouter...</button>
                                                        <ul class="dropdown-menu p-3 pre-scrollable">
                                                            <li>
                                                                <input class="form-control w-75" type="text" name="eps/oses_new/amine">
                                                            </li>
                                                            @foreach($souche['oses'] as $oses)
                                                            @if($oses->type == "amine")
                                                            <li>
                                                                <label class="p-1">{{$oses->nom}}</label>
                                                                <input type="checkbox" name="eps/oses/amine">
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <i class="editButton fas fa-plus faForm"></i>

                                                    <ul class="list-unstyled mt-3">
                                                        @foreach($souche['caracterisation_oses'] as $oses)
                                                        @if($oses->type=="amine")
                                                        <li><p href="{{asset("/storage/".$oses->oses)}}" class="d-inline">{{$oses->oses}}</p><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </div>

                                                <div class="input-group col-8 text-left editZone mb-2">
                                                    <div class="row">
                                                        <input type="text" list="dataCaracterisation" placeholder="Type..." class="form-control col-4" id="eps/fichier_caracterisation/type" name="eps/fichier_caracterisation/type">
                                                        <datalist id="dataCaracterisation">
                                                            <option>Ratio monosaccharidiques</option>
                                                            <option>RMN</option>
                                                            <option>Spectre RMN</option>
                                                            <option>Substituants</option>
                                                            <option>Spectre HPLC</option>
                                                            <option>Spectre HPSec</option>
                                                            @foreach($souche['fichier_caracterisation'] as $carac)
                                                                @if($carac->type=="EPS")<option>{{$carac->nom}}</option> @endif
                                                            @endforeach
                                                        </datalist>
                                                        <input type="text" placeholder="Nom" class="form-control col-3" id="eps/fichier_caracterisation/nom" name="eps/fichier_caracterisation/nom">
                                                        <label class="btn btn-default border border-light rounded col-3">
                                                            Parcourir <input type="file" name="eps/fichier_caracterisation/fichier" hidden>
                                                        </label>
                                                        <i class="m-2 editButton fas fa-plus faForm"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <ul class="list-unstyled ">
                                            @foreach($souche['fichier_caracterisation'] as $carac)
                                            @if($carac->type=="EPS")
                                                <li class="m-1">
                                                    <a href="{{asset("/storage/".$carac->fichier)}}" class="font-italic">{{$carac->nom}}</a>
                                                </li>
                                            @endif
                                            @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach

                            <!-- Objecti -->
                            @isset($souche['objectivation'])
                                <div class="ObjectivationEps p-3 d-block">
                                    <h4>Objectivation</h4>
                                    <hr class="w-50" align="left">

                                    <table class="table">
                                        <tr>
                                            <th>Essaie</th>
                                            <th>Protocole</th>
                                            <th>Résultat</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        @foreach($souche['objectivation'] as $objectivation)
                                        @if($objectivation->type=="EPS")
                                            <tr>
                                                <td><p>{{$objectivation->nom}}</p></td>
                                                <td><a href="{{asset("/storage/".$objectivation->protocole)}}" class="font-italic">{{$objectivation->protocole}}</a></td>
                                                <td><a href="{{asset("/storage/".$objectivation->resultat)}}" class="font-italic">{{$objectivation->resultat}}</a></td>
                                                <td>
                                                    <i class="editButton fas fa-pen"></i>
                                                    <i class='fas fa-check checkPostRow'></i>
                                                </td>
                                            </tr>
                                        @endif
                                        @endforeach
                                        @if(false)
                                            <tr>
                                                <td colspan="6"><span class="h5 font-weight-light">Aucune donnée</span></td>
                                            </tr>
                                        @endif
                                        <tr class="editZone">
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" name="eps/objectivation/0/nom" isKey="true">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="eps/objectivation/0/protocole" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="eps/objectivation/0/resultat" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-check faForm"></i>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endisset

                            <!-- Production -->
                            @isset($souche['production'])
                                <div class="ProductionInduEps p-3 d-block">
                                    <h4>Projet industriel</h4>
                                    <hr class="w-50" align="left">

                                    <table class="table">
                                        <tr>
                                            <th>Production</th>
                                            <th>Date</th>
                                            <th>Lieu</th>
                                            <th>Protocole</th>
                                            <th>Résultat</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        @foreach($souche['production'] as $prod)
                                        @if($prod->type=="EPS")
                                            <tr>
                                                <td><p>{{$prod->nom}}</p></td>
                                                <td><p>{{$prod->date}}</p></td>
                                                <td><p>{{$prod->lieu}}</p></td>
                                                <td>
                                                    <a href="{{asset("/storage/".$prod->protocole)}}" class="font-italic">{{$prod->protocole}}</a>
                                                    <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                </td>
                                                <td>
                                                    <a href="{{asset("/storage/".$prod->rapport)}}" class="font-italic">{{$prod->rapport}}</a>
                                                    <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                </td>
                                                <td>
                                                    <i class="editButton fas fa-pen"></i>
                                                    <i class='fas fa-check checkPostRow'></i>
                                                </td>
                                            </tr>
                                        @endif
                                        @endforeach
                                        @if(false)
                                            <tr>
                                                <td colspan="6"><span class="h5 font-weight-light">Aucune donnée</span></td>
                                            </tr>
                                        @endif
                                        <tr class="editZone">
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" name="eps/production/0/nom" isKey="true">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control" type="date" name="eps/production/0/date">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" list="dataLieu" name="eps/production/0/lieu">
                                                    <datalist id="dataLieu">
                                                        @foreach($souche['production'] as $prod)
                                                            <option>{{$prod->lieu}}</option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td class="editZone">
                                                <div class="custom-file">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="eps/production/0/protocole" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="eps/production/0/rapport" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-check faForm"></i>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endisset

                            <!-- Criblage -->
                            @isset($souche['production'])
                                <div class="CriblageEps p-3 d-block">
                                    <h4>Criblage</h4>
                                    <hr class="w-50" align="left">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div>
                                                <table class="table text-center">
                                                    <tbody>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Condition</th>
                                                        <th>Rapport</th>
                                                    </tr>
                                                    @foreach($souche['criblage'] as $criblage)
                                                    @if($criblage->type=="EPS")
                                                        <tr>
                                                            <td><p>{{$criblage->nom}}</p></td>
                                                            <td>
                                                                <a href="{{asset("/storage/".$criblage->conditions)}}" class="font-italic">{{$criblage->conditions}}</a>
                                                                <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                            </td>
                                                            <td>
                                                                <a href="{{asset("/storage/".$criblage->rapport)}}" class="font-italic">{{$criblage->rapport}}</a>
                                                                <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                            </td>
                                                            <td>
                                                                <i class="editButton fas fa-pen"></i>
                                                                <i class='fas fa-check checkPostRow'></i>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @endforeach
                                                    @if(false)
                                                        <tr>
                                                            <td colspan="6"><span class="h5 font-weight-light">Aucune donnée</span></td>
                                                        </tr>
                                                    @endif
                                                    <tr class="editZone">
                                                        <td>
                                                            <div>
                                                                <input class="form-control" type="text" name="eps/criblage/0/nom" isKey="true">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-file">
                                                                <label class="btn btn-default border border-light rounded">
                                                                    Parcourir <input type="file" name="eps/criblage/0/condition" hidden>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-file">
                                                                <label class="btn btn-default border border-light rounded">
                                                                    Parcourir <input type="file" name="eps/criblage/0/rapport" hidden>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="editButton fas fa-check faForm"></i>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                    </div>
                                </div>
                            @endisset

                            </div>
                        </div>
                    </div>
                </div>

                <!-- PHA -->
                <div class="card">
                    <div class="card-header" id="headingPha">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsePha" aria-expanded="false" aria-controls="collapsePha">
                                Synthèse Pha
                            </button>
                        </h2>
                    </div>
                    <div id="collapsePha" class="collapse" aria-labelledby="headingPha" data-parent="#accordionType">
                        <div class="card-body">
                            <div>

                            <!--Projet-->
                                <div class="p-3 d-block">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
                                        @foreach($souche['projet_souche'] as $projet)
                                            <li class="list-inline-item"><a href="{{asset("/storage/".$projet->texte)}}" class="font-italic"></a></li>
                                        @endforeach
                                        <li class="list-inline-item editZone">
                                            <input class="form-control w-75 d-inline" type="text" list="dataProjet" name="pha/projet">
                                            <datalist id="dataProjet">
                                                @foreach($souche['projet'] as $projet)
                                                    <option>{{$projet->nom}}</option>
                                                @endforeach
                                            </datalist>
                                            <i class="editButton fas fa-check ml-1"></i>
                                        </li>
                                    </ul>
                                    <hr class="w-50" align="left">
                                </div>

                            <!-- Carac -->
                            @foreach($souche['caracterisation'] as $carac)
                            @if($carac->type=="PHA")
                                <div class="CaracterisationPha p-3 d-block">
                                    <h4>Caractérisation n°{{$loop->iteration}}</h4>
                                    <hr class="w-50" align="left">
                                    <h6>Poid moléculaire: <span class="font-weight-light">{{$carac->poids_moleculaire }}</span></h6>
                                    <div class="col-md-3">
                                        <ul class="list-unstyled ">
                                            @foreach($souche['fichier_caracterisation'] as $carac)
                                                @if($carac->type=="Pha")
                                                    <li class="m-1">
                                                        <a href="{{asset("/storage/".$carac->fichier)}}" class="font-italic">{{$carac->nom}}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="input-group col-8 text-left editZone mb-2">
                                        <div class="row">
                                            <input type="text" list="dataCaracterisation" placeholder="Type..." class="form-control col-4" id="pha/fichier_caracterisation/type" name="pha/fichier_caracterisation/type">
                                            <datalist id="dataCaracterisation">
                                                <option>Ratio monosaccharidiques</option>
                                                <option>RMN</option>
                                                <option>Spectre RMN</option>
                                                <option>Substituants</option>
                                                <option>Spectre HPLC</option>
                                                <option>Spectre HPSec</option>
                                                @foreach($souche['fichier_caracterisation'] as $carac)
                                                    @if($carac->type=="EPS")<option>{{$carac->nom}}</option> @endif
                                                @endforeach
                                            </datalist>
                                            <input type="text" placeholder="Nom" class="form-control col-3" id="pha/fichier_caracterisation/nom" name="pha/fichier_caracterisation/nom">
                                            <label class="btn btn-default border border-light rounded col-3">
                                                Parcourir <input type="file" name="pha/fichier_caracterisation/fichier" hidden>
                                            </label>
                                            <i class="m-2 editButton fas fa-plus faForm"></i>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach

                            <!-- Objecti -->
                            @isset($souche['objectivation'])
                                <div class="ObjectivationPha p-3 d-block">
                                    <h4>Objectivation</h4>
                                    <hr class="w-50" align="left">

                                    <table class="table">
                                        <tr>
                                            <th>Essaie</th>
                                            <th>Protocole</th>
                                            <th>Résultat</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        @foreach($souche['objectivation'] as $objectivation)
                                        @if($objectivation->type=="PHA")
                                            <tr>
                                                <td><p>{{$objectivation->nom}}</p></td>
                                                <td><a href="{{asset("/storage/".$objectivation->protocole)}}" class="font-italic">{{$objectivation->protocole}}</a></td>
                                                <td><a href="{{asset("/storage/".$objectivation->resultat)}}" class="font-italic">{{$objectivation->resultat}}</a></td>
                                                <td>
                                                    <i class="editButton fas fa-pen"></i>
                                                    <i class='fas fa-check checkPostRow'></i>
                                                </td>
                                            </tr>
                                        @endif
                                        @endforeach
                                        <tr class="editZone">
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" name="pha/objectivation/0/nom" isKey="true">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="pha/objectivation/0/protocole" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="pha/objectivation/0/resultat" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-check faForm"></i>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endisset

                            <!-- Production -->
                            @isset($souche['production'])
                                <div class="ProductionInduPha p-3 d-block">
                                    <h4>Projet industriel</h4>
                                    <hr class="w-50" align="left">

                                    <table class="table">
                                        <tr>
                                            <th>Production</th>
                                            <th>Date</th>
                                            <th>Lieu</th>
                                            <th>Protocole</th>
                                            <th>Résultat</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        @foreach($souche['production'] as $prod)
                                        @if($prod->type=="PHA")
                                            <tr>
                                                <td><p>{{$prod->nom}}</p></td>
                                                <td><p>{{$prod->date}}</p></td>
                                                <td><p>{{$prod->lieu}}</p></td>
                                                <td>
                                                    <a href="{{asset("/storage/".$prod->protocole)}}" class="font-italic">{{$prod->protocole}}</a>
                                                    <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                </td>
                                                <td>
                                                    <a href="{{asset("/storage/".$prod->protocole)}}" class="font-italic">{{$prod->rapport}}</a>
                                                    <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                </td>
                                                <td>
                                                    <i class="editButton fas fa-pen"></i>
                                                    <i class='fas fa-check checkPostRow'></i>
                                                </td>
                                            </tr>
                                        @endif
                                        @endforeach
                                        <tr class="editZone">
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" name="pha/production/0/nom" isKey="true">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control" type="date" name="pha/production/0/date">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" list="dataLieu" name="pha/production/0/lieu">
                                                    <datalist id="dataLieu">
                                                        @foreach($souche['production'] as $prod)
                                                            <option>{{$prod->lieu}}</option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td class="editZone">
                                                <div class="custom-file">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="pha/production/0/protocole" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="pha/production/0/rapport" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-check faForm"></i>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endisset

                            <!-- Criblage -->
                            @isset($souche['production'])
                                <div class="CriblagePha p-3 d-block">
                                    <h4>Criblage</h4>
                                    <hr class="w-50" align="left">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div>
                                                <table class="table text-center">
                                                    <tbody>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Condition</th>
                                                        <th>Rapport</th>
                                                    </tr>
                                                    @foreach($souche['criblage'] as $criblage)
                                                    @if($criblage->type=="PHA")
                                                        <tr>
                                                            <td><p>{{$criblage->nom}}</p></td>
                                                            <td>
                                                                <a href="{{asset("/storage/".$criblage->conditions)}}" class="font-italic">{{$criblage->conditions}}</a>
                                                                <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                            </td>
                                                            <td>
                                                                <a href="{{asset("/storage/".$criblage->rapport)}}" class="font-italic">{{$criblage->rapport}}</a>
                                                                <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                            </td>
                                                            <td>
                                                                <i class="editButton fas fa-pen"></i>
                                                                <i class='fas fa-check checkPostRow'></i>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @endforeach
                                                    <tr class="editZone">
                                                        <td>
                                                            <div>
                                                                <input class="form-control" type="text" name="pha/criblage/0/nom" isKey="true">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-file">
                                                                <label class="btn btn-default border border-light rounded">
                                                                    Parcourir <input type="file" name="pha/criblage/0/condition" hidden>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-file">
                                                                <label class="btn btn-default border border-light rounded">
                                                                    Parcourir <input type="file" name="pha/criblage/0/rapport" hidden>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="editButton fas fa-check faForm"></i>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                    </div>
                                </div>
                            @endisset

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Autre -->
                <div class="card">
                    <div class="card-header" id="headingAutre">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseAutre" aria-expanded="false" aria-controls="collapseAutre">
                                Synthèse Autre
                            </button>
                        </h2>
                    </div>
                    <div id="collapseAutre" class="collapse" aria-labelledby="headingAutre" data-parent="#accordionType">
                        <div class="card-body">
                            <div>

                                <!--Projet-->
                                <div class="p-3 d-block">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
                                        @foreach($souche['projet_souche'] as $projet)
                                            <li class="list-inline-item"><a href="{{asset("/storage/".$projet->texte)}}" class="font-italic"></a></li>
                                        @endforeach
                                        <li class="list-inline-item editZone">
                                            <input class="form-control w-75 d-inline" type="text" list="dataProjet" name="autre/projet">
                                            <datalist id="dataProjet">
                                                @foreach($souche['projet'] as $projet)
                                                    <option>{{$projet->nom}}</option>
                                                @endforeach
                                            </datalist>
                                            <i class="editButton fas fa-check ml-1"></i>
                                        </li>
                                    </ul>
                                    <hr class="w-50" align="left">
                                </div>

                            <!-- Carac -->
                            @foreach($souche['caracterisation'] as $carac)
                            @if($carac->type=="Autre")
                                <div class="CaracterisationAutre p-3 d-block">
                                    <h4>Caractérisation n°{{$loop->iteration}}</h4>
                                    <hr class="w-50" align="left">
                                    <h6>Poid moléculaire: <span class="font-weight-light">{{$carac->poids_moleculaire }}</span></h6>
                                    <div class="col-md-3">
                                        <ul class="list-unstyled ">
                                            @foreach($souche['fichier_caracterisation'] as $carac)
                                                @if($carac->type=="Autre")
                                                    <li class="m-1">
                                                        <a href="{{asset("/storage/".$carac->fichier)}}" class="font-italic">{{$carac->nom}}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="input-group col-8 text-left editZone mb-2">
                                        <div class="row">
                                            <input type="text" list="dataCaracterisation" placeholder="Type..." class="form-control col-4" id="autre/fichier_caracterisation/type" name="autre/fichier_caracterisation/type">
                                            <datalist id="dataCaracterisation">
                                                <option>Ratio monosaccharidiques</option>
                                                <option>RMN</option>
                                                <option>Spectre RMN</option>
                                                <option>Substituants</option>
                                                <option>Spectre HPLC</option>
                                                <option>Spectre HPSec</option>
                                                @foreach($souche['fichier_caracterisation'] as $carac)
                                                    @if($carac->type=="EPS")<option>{{$carac->nom}}</option> @endif
                                                @endforeach
                                            </datalist>
                                            <input type="text" placeholder="Nom" class="form-control col-3" id="autre/fichier_caracterisation/nom" name="autre/fichier_caracterisation/nom">
                                            <label class="btn btn-default border border-light rounded col-3">
                                                Parcourir <input type="file" name="autre/fichier_caracterisation/fichier" hidden>
                                            </label>
                                            <i class="m-2 editButton fas fa-plus faForm"></i>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach

                            <!-- Objecti -->
                            @isset($souche['objectivation'])
                                <div class="ObjectivationAutre p-3 d-block">
                                    <h4>Objectivation</h4>
                                    <hr class="w-50" align="left">

                                    <table class="table">
                                        <tr>
                                            <th>Essaie</th>
                                            <th>Protocole</th>
                                            <th>Résultat</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        @foreach($souche['objectivation'] as $objectivation)
                                            @if($objectivation->type=="Autre")
                                                <tr>
                                                    <td><p>{{$objectivation->nom}}</p></td>
                                                    <td><a href="{{asset("/storage/".$objectivation->protocole)}}" class="font-italic">{{$objectivation->protocole}}</a></td>
                                                    <td><a href="{{asset("/storage/".$objectivation->resultat)}}" class="font-italic">{{$objectivation->resultat}}</a></td>
                                                    <td>
                                                        <i class="editButton fas fa-pen"></i>
                                                        <i class='fas fa-check checkPostRow'></i>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr class="editZone">
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" name="autre/objectivation/0/nom" isKey="true">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="autre/objectivation/0/protocole" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="autre/objectivation/0/resultat" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-check faForm"></i>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endisset

                            <!-- Production -->
                            @isset($souche['production'])
                                <div class="ProductionInduAutre p-3 d-block">
                                    <h4>Projet industriel</h4>
                                    <hr class="w-50" align="left">

                                    <table class="table">
                                        <tr>
                                            <th>Production</th>
                                            <th>Date</th>
                                            <th>Lieu</th>
                                            <th>Protocole</th>
                                            <th>Résultat</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        @foreach($souche['production'] as $prod)
                                            @if($prod->type=="Autre")
                                                <tr>
                                                    <td><p>{{$prod->nom}}</p></td>
                                                    <td><p>{{$prod->date}}</p></td>
                                                    <td><p>{{$prod->lieu}}</p></td>
                                                    <td>
                                                        <a href="{{asset("/storage/".$prod->protocole)}}" class="font-italic">{{$prod->protocole}}</a>
                                                        <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                    </td>
                                                    <td>
                                                        <a href="{{asset("/storage/".$prod->protocole)}}" class="font-italic">{{$prod->rapport}}</a>
                                                        <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                    </td>
                                                    <td>
                                                        <i class="editButton fas fa-pen"></i>
                                                        <i class='fas fa-check checkPostRow'></i>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr class="editZone">
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" name="autre/production/0/nom" isKey="true">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control" type="date" name="autre/production/0/date">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" list="dataLieu" name="autre/production/0/lieu">
                                                    <datalist id="dataLieu">
                                                        @foreach($souche['production'] as $prod)
                                                            <option>{{$prod->lieu}}</option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td class="editZone">
                                                <div class="custom-file">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="autre/production/0/protocole" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="autre/production/0/rapport" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="editButton fas fa-check faForm"></i>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endisset

                            <!-- Criblage -->
                            @isset($souche['production'])
                                <div class="CriblageAutre p-3 d-block">
                                    <h4>Criblage</h4>
                                    <hr class="w-50" align="left">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div>
                                                <table class="table text-center">
                                                    <tbody>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Condition</th>
                                                        <th>Rapport</th>
                                                    </tr>
                                                    @foreach($souche['criblage'] as $criblage)
                                                        @if($criblage->type=="Autre")
                                                            <tr>
                                                                <td><p>{{$criblage->nom}}</p></td>
                                                                <td>
                                                                    <a href="{{asset("/storage/".$criblage->conditions)}}" class="font-italic">{{$criblage->conditions}}</a>
                                                                    <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                                </td>
                                                                <td>
                                                                    <a href="{{asset("/storage/".$criblage->rapport)}}" class="font-italic">{{$criblage->rapport}}</a>
                                                                    <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                                </td>
                                                                <td>
                                                                    <i class="editButton fas fa-pen"></i>
                                                                    <i class='fas fa-check checkPostRow'></i>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    <tr class="editZone">
                                                        <td>
                                                            <div>
                                                                <input class="form-control" type="text" name="autre/criblage/0/nom" isKey="true">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-file">
                                                                <label class="btn btn-default border border-light rounded">
                                                                    Parcourir <input type="file" name="autre/criblage/0/condition" hidden>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-file">
                                                                <label class="btn btn-default border border-light rounded">
                                                                    Parcourir <input type="file" name="autre/criblage/0/rapport" hidden>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="editButton fas fa-check faForm"></i>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                    </div>
                                </div>
                            @endisset

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        @csrf
    </form>

    </div>
@endsection

@section('customJs')
<script type="text/javascript" src="{{ URL::asset('js/souche.js') }}"></script>
@endsection