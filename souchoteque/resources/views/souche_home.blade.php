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
                        <div id="carouselSouche" class="carousel slide border-warning border" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselSouche" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselSouche" data-slide-to="1"></li>
                                <li data-target="#carouselSouche" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://via.placeholder.com/250" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://via.placeholder.com/350" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://via.placeholder.com/450" class="d-block w-100" alt="...">
                                </div>
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

                            <a href="{{asset('souches/'.$souche['souche'][0]->description)}}" class="font-italic"><i class="fas fa-file-alt mb-2"></i> {{$souche['souche'][0]->description}}</a><i class="editButton fas fa-times deleteCross ml-2"></i>
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
                                                <input type="text" class="form-control" readonly value="{{$souche['souche'][0]->origine}}" name="souche/origine">
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
                                                <input type="number" class="form-control" size="4" readonly value="{{$souche['souche'][0]->annee_collecte}}" name="souche/annee_collecte">
                                                <div class="input-group-append  editZone">
                                                <span class="input-group-text">
                                                    <i class="editButton fas fa-lock unlockEdit"></i>
                                                </span>
                                                </div>
                                            </div>

                                            <a href="{{asset('souches/'.$souche['souche'][0]->description)}}" class="font-italic"><i class="fas fa-file-alt" mb-3></i> {{$souche['souche'][0]->description}}</a>&nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>

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
                                                    <input type="text" size="4" class="form-control" readonly value="{{$souche['souche'][0]->annee_creation}}" name="souche/annee_creation">
                                                    <div class="input-group-append editZone">
                                                    <span class="input-group-text">
                                                        <i class="editButton fas fa-lock unlockEdit"></i>
                                                    </span>
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3" id="hcb">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">Dépot HCB&nbsp;</span>
                                                    </div>
                                                    <select class="form-control col-sm- showSelect" id="isHcb" disabled>
                                                        <option @if($souche['souche'][0]->validation_hcb) selected @endif>Oui</option>
                                                        <option @if(!$souche['souche'][0]->validation_hcb) selected @endif>Non</option>
                                                    </select>
                                                    <div class="input-group-append editZone">
                                                    <span class="input-group-text">
                                                        <i class="editButton fas fa-lock unlockEdit"></i>
                                                    </span>
                                                    </div>
                                                </div>

                                                @if($souche['souche'][0]->validation_hcb)
                                                    <a href="{{$souche['souche'][0]->validation_hcb}}" class="font-italic"><i class="mt-3 fas fa-file-alt text-danger"></i> validation_hcb.pdf</a>&nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                                @endif
                                                @if($souche['souche'][0]->texte_hcb)
                                                    <a href="{{$souche['souche'][0]->texte_hcb}}" class="font-italic"><i class="mb-3 fas fa-file-alt text-danger"></i> texte_hcb.pdf</a>&nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>
                                                @endif

                                                <div class="input-group mb-3 editZone" id="hcbAdd">
                                                    <div class="input-group-prepend">
                                                        <select class="form-control" id="souche/hcb/type" name="souche/hcb/type">
                                                            <option>Texte HCB</option>
                                                            <option>Autorisation</option>
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
                                            <div id="carouselLieu" class="carousel slide border border-warning" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carouselLieu" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carouselLieu" data-slide-to="1"></li>
                                                    <li data-target="#carouselLieu" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="https://via.placeholder.com/250" class="d-block w-100">
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <h5>File name 1</h5>
                                                            <p>Description 1</p>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="https://via.placeholder.com/300" class="d-block w-100">
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <h5>File Name 2</h5>
                                                            <p>Description 2</p>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="https://via.placeholder.com/400" class="d-block w-100">
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <h5>File name 3</h5>
                                                            <p>Description 3</p>
                                                        </div>
                                                    </div>
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

                                            <div class="input-group mb-3 mt-1 editZone">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="description/image" name="description/image">
                                                    <label class="custom-file-label" for="description/image" data-browse="A">Ajouter une image</label>
                                                </div>
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="editButton fas fa-plus faForm"></i>
                                                </span>
                                                </div>
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
                                            <p><a href="{{$file->fichier}}" class="font-italic"><i class="fas fa-file-alt mt-3 mr-1"></i>{{$file->texte}}</a><i class="editButton fas fa-times deleteCross ml-2"></i></p>
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
                                                <input type="file" class="custom-file-input" id="description/file" name="description/file">
                                                <label class="custom-file-label" for="description/file"></label>
                                            </div>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="editButton fas fa-plus faForm"></i>
                                            </span>
                                            </div>
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
                                                <a href="{{$id->ref}}/identification/{{$id->sequence}}" class="font-italic"><i class="fas fa-file-alt mr-1"></i>{{$id->sequence}}</a>
                                                <i class="editButton fas fa-times deleteCross ml-2"></i>
                                            </td>
                                            <td class="3">
                                                <a href="{{$id->ref}}/identification/{{$id->arbre}}" class="font-italic"><i class="fas fa-file-alt text-danger mr-1"></i>{{$id->arbre}}</a>
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
                                                    <input type="text" class="form-control" list="dataIdentification" placeholder="Type..." name="identification/type">
                                                    <datalist id="dataIdentification">
                                                    @foreach($souche['identification'] as $id)
                                                        <option>{{$id->type}}</option>
                                                    @endforeach
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file text-left">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="identification/sequence" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file text-left">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="identification/arbre" hidden>
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
                        <div class="card border border-info">
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
                                    <table class="table text-center table-hover">
                                        <tbody>
                                            <tr>
                                                <th style="width: 10%;">#</th>
                                                <th style="width: 20%;">Dépot</th>
                                                <th style="width: 20%;">Numéro</th>
                                                <th style="width: 30%;">Dossier</th>
                                                <th style="width: 10%;">Stock</th>
                                                <th style="width: 10%;">&nbsp;</th>
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
                                                        <p>{{$p->numero}}</p>
                                                    </td>
                                                    <td>
                                                        <a href="{{$p->dossier_depot}}" class="font-italic"><i class="fas fa-file-alt text-danger"></i> dépot.pdf</a>
                                                        &nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>
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
                                                <td colspan="2">
                                                    <p>
                                                        <a href="{{$p->scan_validation}}" class="font-italic"><i class="fas fa-file-alt text-danger"></i> validation.pdf</a>
                                                        &nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>
                                                    </p>
                                                </td>
                                            </tr>
                                            </tr>
                                            @endforeach

                                            <tr class="editZone">
                                                <td>&nbsp;</td>
                                                <td>
                                                    <div>
                                                        <input class="form-control" type="date" class="input-group" name="pasteur/date_depot">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input class="form-control" type="text" class="input-group" name="pasteur/numero">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-file text-left">
                                                        <label class="btn btn-default border border-light rounded">
                                                            Parcourir <input type="file" name="pasteur/dossier_depot" hidden>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input class="form-control" type="text" class="input-group" name="pasteur/stock">
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
                        <div class="card border border-info">
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
                                            <th style="width: 3%;">#</th>
                                            <th style="width: 15%;">Type</th>
                                            <th style="width: 17.5%;">Demande</th>
                                            <th style="width: 17.5%;">Secteur</th>
                                            <th style="width: 22.5%;">Texte</th>
                                            <th style="width: 22.5%;">INPI</th>
                                            <th style="width: 2%;">&nbsp;</th>
                                        </tr>
                                        @foreach($souche['brevet_soleau'] as $brevet)
                                        <tr>
                                            <td>
                                                <p>{{$brevet->titre}}</p>
                                            </td>
                                            <td>
                                                <p>@if($brevet->inpi==null) Brevet @else Soleau @endif</p>
                                            </td>
                                            <td>
                                                <p>{{$brevet->date}}</p>
                                            </td>
                                            <td>
                                                <p>{{$brevet->activite}}</p>
                                            </td>
                                            <td>
                                                @if($brevet->scan!="")
                                                <a href="{{$brevet->scan}}" class="font-italic"><i class="fas fa-file-alt text-danger mr-1"></i>{{$brevet->scan}}</a>
                                                <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($brevet->inpi!="")
                                                <a href="{{$brevet->inpi}}" class="font-italic"><i class="fas fa-file-alt text-danger mr-1"></i>{{$brevet->inpi}}</a>
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
                                                    <input class="form-control form-control-sm" type="text" class="input-group" name="brevet_soleau/titre">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <select class="form-control form-control-sm" name="brevet_soleau/type">
                                                        <option>Brevet</option>
                                                        <option>Soleau</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control form-control-sm" type="text" class="input-group" name="brevet_soleau/date">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control form-control-sm" type="text" class="input-group" list="dataSecteur" name="brevet_soleau/activite">
                                                    <datalist id="dataSecteur">
                                                        <option>Cosmétique</option>
                                                        <option>Médicale</option>
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file text-left form-control-sm">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="brevet_soleau/scan" hidden>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file text-left form-control-sm">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="brevet_soleau/inpi" hidden>
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
                                            <th>Document</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        @foreach($souche['publication'] as $p)
                                            <tr>
                                                <td><span>{{$loop->index+1}}</span></td>
                                                <td><p>{{$p->date}}</p></td>
                                                <td>
                                                    <a href="{{$p->fichier}}" class="font-italic"><i class="fas fa-file-alt text-danger"></i> {{$p->nom}}</a>
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
                                                    <input class="form-control" type="date" name="publication/date">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="brevet_soleau/scan" hidden>
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
                                            <th style="width: 2.5%">#</th>
                                            <th style="width: 20%">Début</th>
                                            <th style="width: 20%">Fin</th>
                                            <th style="width: 25%">Partenaire</th>
                                            <th style="width: 25%">Secteur</th>
                                            <th style="width: 2.5%">&nbsp;</th>
                                        </tr>
                                        @foreach($souche['exclusivite'] as $exclu)
                                        <tr>
                                            <td><span>{{$exclu->id}}</span></td>
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
                                            <td>&nbsp;</td>
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" name="exclusivite/date_debut">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" name="exclusivite/date_fin">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" list="dataPart" name="exclusivite/partenaire">
                                                    <datalist id="dataPart">
                                                        <option>EDF</option>
                                                        <option>L'oréal</option>
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" class="input-group" list="dataSecteur" name="exclusivite/activite">
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
                                            <th style="width: 2.5%">#</th>
                                            <th style="width: 20%">Date</th>
                                            <th style="width: 20%">Partenaire</th>
                                            <th style="width: 25%">Secteur</th>
                                            <th style="width: 25%">Document</th>
                                            <th style="width: 2.5%">&nbsp;</th>
                                        </tr>
                                        @foreach($souche['projet_souche'] as $projet)
                                        <tr>
                                            <td><span>{{$loop->iteration}}</span></td>
                                            <td><p>{{$projet->date}}</p></td>
                                            <td><p>{{$projet->partenaire}}</p></td>
                                            <td><p>{{$projet->activite}}</p></td>
                                            <td>
                                                <a href="{{$projet->ref}}/projet/{{$projet->texte}}" class="font-italic"><i class="fas fa-file-alt text-danger mr-1"></i>{{$projet->texte}}</a>
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
                                                    <input class="form-control" type="text" name="projet/date">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" list="dataPart" name="projet/partenaire">
                                                    <datalist id="dataPart">
                                                        <option>EDF</option>
                                                        <option>L'oréal</option>
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input class="form-control" type="text" class="input-group" list="dataSecteur" name="projet/ativite">
                                                    <datalist id="dataSecteur">
                                                        <option>Cosmétique</option>
                                                        <option>Médicale</option>
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-file text-left">
                                                    <label class="btn btn-default border border-light rounded">
                                                        Parcourir <input type="file" name="projet/texte" hidden>
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
                            <div class="row">

                                <!--Projet-->
                                <div class="border border-warning">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
                                        <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet1.pdf</a><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                        <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet2.pdf</a><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                        <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet3.pdf</a><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                        <li class="list-inline-item editZone">
                                            <input class="form-control w-75 d-inline" type="text" list="dataProjet" name="souche_projet/projet">
                                            <datalist id="dataProjet">
                                                <option>projet1</option>
                                                <option>projet2</option>
                                                <option>projet3</option>
                                            </datalist>
                                            &nbsp;<i class="editButton fas fa-check d-inline"></i>
                                        </li>
                                    </ul>
                                    <hr class="w-75">
                                </div>

                            <!-- Carac -->
                            @if($souche['caracterisation'][0]->type=="EPS")
                                <div class="CaracterisationEps">
                                    <h4>Caractérisation n°{{$loop->iteration}}</h4>
                                    <hr class="w-50" align="left">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4 font-italic border border-warning">
                                                    <h6>Oses neutres :</h6>
                                                    <div class="button-group d-inline-block">
                                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle editZone" data-toggle="dropdown">Ajouter...</button>
                                                        <ul class="dropdown-menu p-3 pre-scrollable">
                                                            <li>
                                                                <input class="form-control w-75" type="text" placeholder="Ajouter Oses..." name="addOses/neutre">
                                                            </li>
                                                            @foreach($souche['oses'] as $oses)
                                                            @if($oses->type == "neutre")
                                                            <li>
                                                                <label class="p-1">{{$oses->nom}}</label>
                                                                <input type="checkbox" name="oses/neutre">
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <i class="editButton fas fa-plus faForm"></i>

                                                    <ul class="list-unstyled mt-3 ">
                                                        @foreach($souche['oses_souche'] as $oses)
                                                        @if($oses->type=="neutre")
                                                        <li><p href="{{$oses->nom}}" class="d-inline">{{$oses->nom}}</p><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 font-italic border border-warning">
                                                    <h6>Oses acides :</h6>
                                                    <div class="button-group d-inline-block">
                                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle editZone" data-toggle="dropdown">Ajouter...</button>
                                                        <ul class="dropdown-menu p-3 pre-scrollable">
                                                            <li>
                                                                <input class="form-control w-75" type="text" name="addOses/acide">
                                                            </li>
                                                            @foreach($souche['oses'] as $oses)
                                                            @if($oses->type == "acide")
                                                            <li>
                                                                <label class="p-1">{{$oses->nom}}</label>
                                                                <input type="checkbox" name="oses/acide">
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <i class="editButton fas fa-plus faForm"></i>

                                                    <ul class="list-unstyled mt-3">
                                                        @foreach($souche['oses_souche'] as $oses)
                                                        @if($oses->type=="acide")
                                                        <li><p href="{{$oses->nom}}" class="d-inline">{{$oses->nom}}</p><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 font-italic border border-warning">
                                                    <h6>Osamines :</h6>
                                                    <div class="button-group d-inline-block">
                                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle editZone" data-toggle="dropdown">Ajouter...</button>
                                                        <ul class="dropdown-menu p-3 pre-scrollable">
                                                            <li>
                                                                <input class="form-control w-75" type="text" name="addOses/osamine">
                                                            </li>
                                                            @foreach($souche['oses'] as $oses)
                                                            @if($oses->type == "osamine")
                                                            <li>
                                                                <label class="p-1">{{$oses->nom}}</label>
                                                                <input type="checkbox" name="oses/osamine">
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <i class="editButton fas fa-plus faForm"></i>

                                                    <ul class="list-unstyled mt-3">
                                                        @foreach($souche['oses_souche'] as $oses)
                                                        @if($oses->type=="osamine")
                                                        <li><p href="{{$oses->nom}}" class="d-inline">{{$oses->nom}}</p><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </div>

                                                <div class="input-group col-8 text-left editZone">
                                                    <div class="input-group-prepend">
                                                        <input type="text" list="dataCaracterisation" placeholder="Type..." class="form-control" id="fichier_caracterisation/nom">
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
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="fichier_caracterisation.fichier" name="fichier_caracterisation/fichier">
                                                        <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter un fichier </label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="editButton fas fa-plus faForm"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <ul class="list-unstyled ">
                                                @foreach($souche['fichier_caracterisation'] as $carac)
                                                    @if($carac->type=="EPS")
                                                        <li class="m-1">
                                                            <a href="{{$carac->ref}}/caracterisation/{{$carac->fichier}}" class="font-italic"><i class="fas fa-file-alt text-primary"></i>{{$carac->nom}}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
                            <div class="row">

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
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="m-3">
                <nav>
                    <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Synthèse Eps</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Synthèse Pha</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Synthèse autre</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane show active bg-white border rounded p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div>
                            <!-- Filtre affichage -->
                            <div>
                                <h6>Afficher :</h6>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkCaracterisationEps" name="checkCaracterisationEps" checked>
                                        <label class="form-check-label" for="checkCaracterisationEps">Caractérisation</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkObjectivationEps" name="checkObjectivationEps" checked>
                                        <label class="form-check-label" for="checkObjectivationEps">Objectivation</label>
                                    </div>
                                    <div class="form-check form-check-inline d-none">
                                        <input class="form-check-input" type="checkbox" id="checkConditionEps" name="checkConditionEps" checked>
                                        <label class="form-check-label" for="checkConditionEps">Condition de culture</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkCriblageEps" name="checkCriblageEps" checked>
                                        <label class="form-check-label" for="checkCriblageEps">Criblage</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkProductionInduEps" name="checkProductionInduEps" checked>
                                        <label class="form-check-label" for="checkProductionInduEps">Production Industriel</label>
                                    </div>
                                </div>
                                <hr class="w-75">
                            </div>

                            <!-- Projet -->
                            <div class="border border-warning">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
                                    <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet1.pdf</a><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                    <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet2.pdf</a><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                    <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet3.pdf</a><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                    <li class="list-inline-item editZone">
                                        <input class="form-control w-75 d-inline" type="text" list="dataProjet" name="souche_projet.projet">
                                        <datalist id="dataProjet">
                                            <option>projet1</option>
                                            <option>projet2</option>
                                            <option>projet3</option>
                                        </datalist>
                                        &nbsp;<i class="editButton fas fa-check d-inline"></i>
                                    </li>
                                </ul>
                                <hr class="w-75">
                            </div>

                            <!-- Carac -->
                            @foreach($souche['caracterisation'] as $caracterisation)
                            @if($caracterisation->type=="EPS")
                            <div class="CaracterisationEps">
                                <h4>Caractérisation n°{{$loop->iteration}}</h4>
                                <hr class="w-50" align="left">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4 font-italic border border-warning">
                                                <h6>Oses neutres :</h6>
                                                <div class="button-group d-inline-block">
                                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle editZone" data-toggle="dropdown">Ajouter...</button>
                                                    <ul class="dropdown-menu p-3 pre-scrollable">
                                                        <li>
                                                            <input class="form-control w-75" type="text" placeholder="Ajouter Oses..." name="addOses.neutre">
                                                        </li>
                                                        {{--@foreach()
                                                        <li>
                                                            <label>&nbsp;Option 1</label>
                                                            <input type="checkbox" name="oses.neutre">
                                                        </li>
                                                        @endforeach--}}

                                                        <li>
                                                            <label>&nbsp;Option 2</label>
                                                            <input type="checkbox" name="oses.neutre">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 3</label>
                                                            <input type="checkbox" name="oses.neutre">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 4</label>
                                                            <input type="checkbox" name="oses.neutre">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 5</label>
                                                            <input type="checkbox" name="oses.neutre">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 6</label>
                                                            <input type="checkbox" name="oses.neutre">
                                                        </li>
                                                    </ul>
                                                </div>
                                                <i class="editButton fas fa-plus faForm"></i>

                                                <ul class="list-unstyled mt-3 ">
                                                    <li><p href="glucose" class="d-inline">Glucose</p><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                    <li><p href="galatose" class="d-inline">Galactose</p><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                    <li><p href="mannose" class="d-inline">Mannose</p><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 font-italic border border-warning">
                                                <h6>Oses acides :</h6>
                                                <div class="button-group d-inline-block">
                                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle editZone" data-toggle="dropdown">Ajouter...</button>
                                                    <ul class="dropdown-menu p-3 pre-scrollable">
                                                        <li>
                                                            <input class="form-control w-75" type="text" name="addOses.acide">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 1</label>
                                                            <input type="checkbox" name="oses.acide">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 2</label>
                                                            <input type="checkbox" name="oses.acide">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 3</label>
                                                            <input type="checkbox" name="oses.acide">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 4</label>
                                                            <input type="checkbox" name="oses.acide">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 5</label>
                                                            <input type="checkbox" name="oses.acide">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 6</label>
                                                            <input type="checkbox" name="oses.acide">
                                                        </li>
                                                    </ul>
                                                </div>
                                                <i class="editButton fas fa-plus faForm"></i>

                                                <ul class="list-unstyled mt-3">
                                                    <li>Acide glucuronique&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                    <li>Acide galacturonique&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 font-italic border border-warning">
                                                <h6>Osamines :</h6>
                                                <div class="button-group d-inline-block">
                                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle editZone" data-toggle="dropdown">Ajouter...</button>
                                                    <ul class="dropdown-menu p-3 pre-scrollable">
                                                        <li>
                                                            <input class="form-control w-75" type="text" name="addOses.osamine">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 1</label>
                                                            <input type="checkbox" name="oses.osamine">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 2</label>
                                                            <input type="checkbox" name="oses.osamine">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 3</label>
                                                            <input type="checkbox" name="oses.osamine">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 4</label>
                                                            <input type="checkbox" name="oses.osamine">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 5</label>
                                                            <input type="checkbox" name="oses.osamine">
                                                        </li>
                                                        <li>
                                                            <label>&nbsp;Option 6</label>
                                                            <input type="checkbox" name="oses.osamine">
                                                        </li>
                                                    </ul>
                                                </div>
                                                <i class="editButton fas fa-plus faForm"></i>

                                                <ul class="list-unstyled mt-3">
                                                    <li>Glucosamine&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                    <li>Galactosamine&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                                </ul>
                                            </div>

                                            <div class="input-group col-8 text-left editZone">
                                                <div class="input-group-prepend">
                                                    <input type="text" list="dataCaracterisation" placeholder="Type..." class="form-control" id="fichier_caracterisation.nom">
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
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="fichier_caracterisation.fichier" name="fichier_caracterisation.fichier">
                                                    <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter un fichier </label>
                                                </div>
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="editButton fas fa-plus faForm"></i>
                                                </span>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="list-unstyled ">
                                            @foreach($souche['fichier_caracterisation'] as $carac)
                                            @if($carac->type=="EPS")
                                            <li class="m-1">
                                                <a href="{{$carac->ref}}/caracterisation/{{$carac->fichier}}" class="font-italic"><i class="fas fa-file-alt text-primary"></i>{{$carac->nom}}</a>
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
                            <div class="ObjectivationEps mt-2">
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
                                    <tr>
                                        <td><p>{{$objectivation->nom}}</p></td>
                                        <td><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger mr-1"></i>{{$objectivation->protocole}}</a></td>
                                        <td><a href="#" class="font-italic"><i class="fas fa-file-alt text-success mr-1"></i>{{$objectivation->resultat}}</a></td>
                                        <td>
                                            <i class="editButton fas fa-pen"></i>
                                            <i class='fas fa-check checkPostRow'></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="editZone">
                                        <td>
                                            <div>
                                                <input class="form-control" type="text">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-file">
                                                <label class="btn btn-default border border-light rounded">
                                                    Parcourir <input type="file" name="objectivation.protocole" hidden>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-file">
                                                <label class="btn btn-default border border-light rounded">
                                                    Parcourir <input type="file" name="objectivation.resultat" hidden>
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

                            <!-- Projet Indu -->
                            @isset($souche['production'])
                            <div class="ProductionInduEps">
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
                                    <tr>
                                        <td><p>{{$prod->nom}}</p></td>
                                        <td><p>{{$prod->date}}</p></td>
                                        <td><p>{{$prod->lieu}}</p></td>
                                        <td><a href="{{$prod->ref}}/production/{{$prod->protocole}}" class="font-italic"><i class="fas fa-file-alt text-danger mr-2"></i>{{$prod->protocole}}</a></td>
                                        <td><a href="{{$prod->ref}}/production/{{$prod->protocole}}" class="font-italic"><i class="fas fa-file-alt text-success mr-2"></i>{{$prod->rapport}}</a></td>
                                        <td>
                                            <i class="editButton fas fa-pen"></i>
                                            <i class='fas fa-check checkPostRow'></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="editZone">
                                        <td>
                                            <div>
                                                <input class="form-control" type="text" name="production.nom">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <input class="form-control" type="date" name="production.date">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <input class="form-control" type="text" list="dataLieu" name="production.lieu">
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
                                                    Parcourir <input type="file" name="production.protocole" hidden>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-file">
                                                <label class="btn btn-default border border-light rounded">
                                                    Parcourir <input type="file" name="production.rapport" hidden>
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
                            <div class="CriblageEps">
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
                                                    <tr>
                                                        <td><p>{{$criblage->nom}}</p></td>
                                                        <td>
                                                            <a href="{{$criblage->ref}}/condition/{{$criblage->conditions}}" class="font-italic"><i class="fas fa-file-alt mr-2"></i>{{$criblage->conditions}}</a>
                                                            <i class="editButton fas fa-times deleteCross ml-2"></i>
                                                        </td>
                                                        <td>
                                                            <a href="{{$criblage->ref}}/condition/{{$criblage->rapport}}" class="font-italic"><i class="fas fa-file-alt text-danger mr-2"></i>{{$criblage->rapport}}</a>
                                                            <i class="editButton fas fa-times deleteCross ml-2"></i>
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
                                                            <input class="form-control" type="text" name="criblage.nom">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-file">
                                                            <label class="btn btn-default border border-light rounded">
                                                                Parcourir <input type="file" name="criblage.condition" hidden>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-file">
                                                            <label class="btn btn-default border border-light rounded">
                                                                Parcourir <input type="file" name="criblage.rapport" hidden>
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
                        </div>
                        @endisset

                        <hr>
                        <div class="input-group col-4 editZone">
                            <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option></option>
                                <option>Caractérisation</option>
                                <option>Condition de culture</option>
                                <option>Criblage</option>
                                <option>Production industriel</option>
                                <option>Objectivation</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="button"><i class="editButton fas fa-plus faForm"></i>&nbsp;Ajouter</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane bg-white border rounded p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div>
                            <!-- Filtre affichage -->
                            <div>
                                <h6>Afficher :</h6>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkCaracterisationPha" name="checkCaracterisationPha" checked>
                                        <label class="form-check-label" for="checkCaracterisationPha">Caractérisation</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkObjectivationPha" name="checkObjectivationPha" checked>
                                        <label class="form-check-label" for="checkObjectivationPha">Objectivation</label>
                                    </div>
                                    <div class="form-check form-check-inline d-none">
                                        <input class="form-check-input" type="checkbox" id="checkConditionPha" name="checkConditionPha" checked>
                                        <label class="form-check-label" for="checkConditionPha">Condition de culture</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkCriblagePha" name="checkCriblagePha" checked>
                                        <label class="form-check-label" for="checkCriblagePha">Criblage</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkProductionInduPha" name="checkProductionInduPha" checked>
                                        <label class="form-check-label" for="checkProductionInduPha">Production Industriel</label>
                                    </div>
                                </div>
                                <hr class="w-75">
                            </div>

                            <!-- Projet -->
                            <div class="border border-warning">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
                                    <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet1.pdf</a></li>
                                    <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet2.pdf</a></li>
                                    <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet3.pdf</a></li>
                                    <li class="list-inline-item editZone">
                                        <input class="form-control w-75 d-inline" type="text" list="dataProjet">
                                        <datalist id="dataProjet">
                                            <option>projet1</option>
                                            <option>projet2</option>
                                            <option>projet3</option>
                                        </datalist>
                                        &nbsp;<i class="editButton fas fa-check d-inline"></i>
                                    </li>
                                </ul>
                                <hr class="w-75">
                            </div>

                            <!-- Carac -->
                            <div class="CaracterisationPha">
                                <h4>Caractérisation</h4>
                                <hr class="w-50" align="left">
                                <ul class="list-unstyled list-inline">
                                    @foreach($souche['fichier_caracterisation'] as $file)
                                    @if($file->type=="PHA")
                                    <li class="list-inline-item m-1">
                                        <a href="{{$file->ref}}/caracterisation/{{$file->fichier}}" class="font-italic"><i class="fas fa-file-alt text-primary mr-1"></i>{{$file->nom}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                                <div class="input-group col-8 text-left editZone">
                                    <div class="input-group-prepend">
                                        <input type="text" list="dataCaracterisation" placeholder="Type..." class="form-control" id="">
                                        <datalist id="dataCaracterisation">
                                            <option>Ratio monosaccharidiques</option>
                                            <option>RMN</option>
                                            <option>Spectre RMN</option>
                                            <option>Substituants</option>
                                            <option>Spectre HPLC</option>
                                            <option>Spectre HPSec</option>
                                            @foreach($souche['fichier_caracterisation'] as $file)
                                            @if($file->type=="PHA")
                                            <option>{{$file->nom}}</option>
                                            @endif
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileDescription">
                                        <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter un fichier </label>
                                    </div>
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="editButton fas fa-plus faForm"></i>
                                    </span>
                                    </div>
                                </div>
                                <br>
                            </div>

                            <!-- Objecti -->
                            <div class="ObjectivationPha">
                                <h4>Objectivation n°1</h4>
                                <hr class="w-50" align="left">

                                <table class="table">
                                    <tr>
                                        <th>Essaie</th>
                                        <th>Protocole</th>
                                        <th>Résultat</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <td>Essaie n°1</td>
                                        <td><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> rapport.pdf</a></td>
                                        <td><a href="#" class="font-italic"><i class="fas fa-file-alt text-success"></i> data.xls</a></td>
                                    </tr>
                                    <tr class="editZone">
                                        <td>
                                            <input class="form-control" type="text">
                                        </td>
                                        <td>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileDescription">
                                                <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter un fichier </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileDescription">
                                                <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter un fichier </label>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="editButton fas fa-check faForm"></i>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Projet Indu -->
                            <div class="ProductionInduPha">
                                <h4>Projet industriel n°1</h4>
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
                                    <tr>
                                        <td>Production n°1</td>
                                        <td>20/12/1997</td>
                                        <td>Brest</td>
                                        <td><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> rapport.pdf</a></td>
                                        <td><a href="#" class="font-italic"><i class="fas fa-file-alt text-success"></i> data.xls</a></td>
                                    </tr>
                                    <tr class="editZone">
                                        <td>
                                            <input class="form-control" type="text">
                                        </td>
                                        <td>
                                            <input class="form-control" type="date">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" list="dataLieu">
                                            <datalist id="dataLieu">
                                                <option>Brest</option>
                                                <option>Rennes</option>
                                            </datalist>
                                        </td>
                                        <td>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileDescription">
                                                <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileDescription">
                                                <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter </label>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="editButton fas fa-check faForm"></i>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Criblage -->
                            <div class="CriblagePha">
                                <h4>Criblage n°1</h4>
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
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <p>
                                                            <a href="#" class="font-italic"><i class="fas fa-file-alt"></i> description.docx</a>
                                                            &nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> rapport.pdf</a>
                                                            &nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <i class="editButton fas fa-pen"></i>
                                                        <i class='fas fa-check checkPostRow'></i>
                                                    </td>
                                                </tr>
                                                <tr class="editZone">
                                                    <td>
                                                        &nbsp;
                                                    </td>
                                                    <td>
                                                        <div class="custom-file text-left">
                                                            <input type="file" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Ajouter description</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-file text-left">
                                                            <input type="file" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Ajouter rapport</label>
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
                        </div>

                        <hr>
                        <div class="input-group col-4 editZone">
                            <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option></option>
                                <option>Caractérisation</option>
                                <option>Condition de culture</option>
                                <option>Criblage</option>
                                <option>Production industriel</option>
                                <option>Objectivation</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="button"><i class="editButton fas fa-plus faForm"></i>&nbsp;Ajouter</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane bg-white border rounded p-3" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div>
                            <!-- Filtre affichage -->
                            <div>
                                <h6>Afficher :</h6>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkCaracterisationAutre" name="checkCaracterisationAutre" checked>
                                        <label class="form-check-label" for="checkCaracterisationAutre">Caractérisation</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkObjectivationAutre" name="checkObjectivationAutre" checked>
                                        <label class="form-check-label" for="checkObjectivationAutre">Objectivation</label>
                                    </div>
                                    <div class="form-check form-check-inline d-none">
                                        <input class="form-check-input" type="checkbox" id="checkConditionAutre" name="checkConditionAutre" checked>
                                        <label class="form-check-label" for="checkConditionAutre">Condition de culture</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkCriblageAutre" name="checkCriblageAutre" checked>
                                        <label class="form-check-label" for="checkCriblageAutre">Criblage</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkProductionInduAutre" name="checkProductionInduAutre" checked>
                                        <label class="form-check-label" for="checkProductionInduAutre">Production Industriel</label>
                                    </div>
                                </div>
                                <hr class="w-75">
                            </div>

                            <!-- Projet -->
                            <div class="">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
                                    <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet1.pdf</a><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                    <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet2.pdf</a><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                    <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet3.pdf</a><i class="editButton fas fa-times deleteCross ml-2"></i></li>
                                    <li class="list-inline-item editZone">
                                        <input class="form-control w-75 d-inline" type="text" list="dataProjet">
                                        <datalist id="dataProjet">
                                            <option>projet1</option>
                                            <option>projet2</option>
                                            <option>projet3</option>
                                        </datalist>
                                        &nbsp;<i class="editButton fas fa-check d-inline"></i>
                                    </li>
                                </ul>
                                <hr class="w-75">
                            </div>

                            <!-- Carac -->
                            <div class="CaracterisationAutre">
                                <h4>Caractérisation n°1</h4>
                                <hr class="w-50" align="left">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item m-1">
                                        <a href="#" class="font-italic"><i class="fas fa-file-alt text-primary"></i> Substituant.docx</a><i class="editButton fas fa-times deleteCross ml-2"></i>
                                    </li>
                                    <li class="list-inline-item m-1">
                                        <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> ratio.pdf</a><i class="editButton fas fa-times deleteCross ml-2"></i>
                                    </li>
                                    <li class="list-inline-item m-1">
                                        <a href="#" class="font-italic"><i class="fas fa-file-alt text-warning"></i> rmn.data</a><i class="editButton fas fa-times deleteCross ml-2"></i>
                                    </li>
                                    <li class="list-inline-item m-1">
                                        <a href="#" class="font-italic"><i class="fas fa-file-alt text-warning"></i> spectreRmn.data</a><i class="editButton fas fa-times deleteCross ml-2"></i>
                                    </li>
                                    <li class="list-inline-item m-1">
                                        <a href="#" class="font-italic"><i class="fas fa-file-alt text-secondary"></i> spectre.png</a><i class="editButton fas fa-times deleteCross ml-2"></i>
                                    </li>
                                    <li class="list-inline-item m-1">
                                        <a href="#" class="font-italic"><i class="fas fa-file-alt text-secondary"></i> spectre HPLC.png</a><i class="editButton fas fa-times deleteCross ml-2"></i>
                                    </li>
                                    <li class="list-inline-item m-1">
                                        <a href="#" class="font-italic"><i class="fas fa-file-alt text-success"></i> tableau.xls</a><i class="editButton fas fa-times deleteCross ml-2"></i>
                                    </li>
                                </ul>
                                <div class="input-group col-8 text-left editZone">
                                    <div class="input-group-prepend">
                                        <input type="text" list="dataCaracterisation" placeholder="Type..." class="form-control" id="">
                                        <datalist id="dataCaracterisation">
                                            <option>Ratio monosaccharidiques</option>
                                            <option>RMN</option>
                                            <option>Spectre RMN</option>
                                            <option>Substituants</option>
                                            <option>Spectre HPLC</option>
                                            <option>Spectre HPSec</option>
                                        </datalist>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileDescription">
                                        <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter un fichier </label>
                                    </div>
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="editButton fas fa-plus faForm"></i>
                                    </span>
                                    </div>
                                </div>
                                <br>
                            </div>

                            <!-- Objecti -->
                            <div class="ObjectivationAutre">
                                <h4>Objectivation n°1</h4>
                                <hr class="w-50" align="left">

                                <table class="table">
                                    <tr>
                                        <th>Essaie</th>
                                        <th>Protocole</th>
                                        <th>Résultat</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <td>Essaie n°1</td>
                                        <td><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> rapport.pdf</a></td>
                                        <td><a href="#" class="font-italic"><i class="fas fa-file-alt text-success"></i> data.xls</a></td>
                                    </tr>
                                    <tr class="editZone">
                                        <td>
                                            <input class="form-control" type="text">
                                        </td>
                                        <td>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileDescription">
                                                <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter un fichier </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileDescription">
                                                <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter un fichier </label>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="editButton fas fa-check faForm"></i>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Projet Indu -->
                            <div class="ProductionInduAutre">
                                <h4>Projet industriel n°1</h4>
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
                                    <tr>
                                        <td>Production n°1</td>
                                        <td>20/12/1997</td>
                                        <td>Brest</td>
                                        <td><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> rapport.pdf</a></td>
                                        <td><a href="#" class="font-italic"><i class="fas fa-file-alt text-success"></i> data.xls</a></td>
                                    </tr>
                                    <tr class="editZone">
                                        <td>
                                            <input class="form-control" type="text">
                                        </td>
                                        <td>
                                            <input class="form-control" type="date">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" list="dataLieu">
                                            <datalist id="dataLieu">
                                                <option>Brest</option>
                                                <option>Rennes</option>
                                            </datalist>
                                        </td>
                                        <td>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileDescription">
                                                <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileDescription">
                                                <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter </label>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="editButton fas fa-check faForm"></i>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Criblage -->
                            <div class="CriblageAutre">
                                <h4>Criblage n°1</h4>
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
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <p>
                                                            <a href="#" class="font-italic"><i class="fas fa-file-alt"></i> description.docx</a>
                                                            &nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> rapport.pdf</a>
                                                            &nbsp;&nbsp;<i class="editButton fas fa-times deleteCross ml-2"></i>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <i class="editButton fas fa-pen"></i>
                                                        <i class='fas fa-check checkPostRow'></i>
                                                    </td>
                                                </tr>
                                                <tr class="editZone">
                                                    <td>
                                                        &nbsp;
                                                    </td>
                                                    <td>
                                                        <div class="custom-file text-left">
                                                            <input type="file" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Ajouter description</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-file text-left">
                                                            <input type="file" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Ajouter rapport</label>
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
                        </div>

                        <hr>
                        <div class="input-group col-4 editZone">
                            <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option></option>
                                <option>Caractérisation</option>
                                <option>Condition de culture</option>
                                <option>Criblage</option>
                                <option>Production industriel</option>
                                <option>Objectivation</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="button"><i class="editButton fas fa-plus faForm"></i>&nbsp;Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{ csrf_field() }}
    </form>

    </div>
@endsection

@section('customJs')
<script type="text/javascript" src="{{ URL::asset('js/souche.js') }}"></script>
@endsection