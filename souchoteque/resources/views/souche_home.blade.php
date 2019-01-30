@extends('layout')

@section('body')
    <br>
    <div class="container bg-light pb-3">
        <h4 class="display-4">Souche n°2012</h4>
        <div class="custom-control custom-checkbox text-sm-right mb-2">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">Mode Edition</label>
            <i class="fas fa-pen"></i>
        </div>
        <div class="row">
            <!-- Colonne Gauche -->
            <div class="col-xl-4">
                <br>
                <div class="card" >
                    <div id="carouselSouche" class="carousel slide" data-ride="carousel">
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
                        <h5 class="card-title">Souche sur pétrie</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec nunc commodo, mollis ligula volutpat, eleifend mauris. Quisque et dui pretium, pharetra mauris nec, elementum ipsum. Pellentesque nulla mauris, sollicitudin in bibendum sed, convallis ac ex. Maecenas consequat lectus ac.
                        </p>

                        <p><a href="#" class="font-italic"><i class="fas fa-file-alt"></i> description.docx</a>&nbsp;&nbsp;<i class="fas fa-times text-danger"></i></p>
                        <p>
                            <span class="h6">Stock Cryotubes:&nbsp;</span>
                            <span class="badge badge-primary" title="Stock Polymaris">4</span>
                            <span class="badge badge-secondary" title="Stock Pasteur n°X">2</span>
                        </p>

                    </div>
                </div>
                <br>
            </div>

            <!-- Colonne Droite -->
            <div class="col-xl-8">
                <br>
                <div class="accordion" id="accordionMenu">

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
                                            <input type="text" class="form-control" readonly value="Plougastel">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Année de collecte</span>
                                            </div>
                                            <input type="date" class="form-control" readonly value="2016-10-12">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <p><a href="#" class="font-italic"><i class="fas fa-file-alt"></i> description.docx</a>&nbsp;&nbsp;<i class="fas fa-times text-danger"></i></p>

                                        <hr>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">OGM&nbsp;</span>
                                            </div>
                                            <select class="form-control col-sm-3" id="" disabled>
                                                <option>Oui</option>
                                                <option>Non</option>
                                            </select>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Année de création</span>
                                            </div>
                                            <input type="date" class="form-control" readonly value="2018-10-12">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">Dépot HCB&nbsp;</span>
                                            </div>
                                            <select class="form-control col-sm-3" id="" disabled>
                                                <option>Oui</option>
                                                <option>Non</option>
                                            </select>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <p>
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> autorisation_hcb.pdf</a>&nbsp;&nbsp;<i class="fas fa-times text-danger"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_hcb.pdf</a>&nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                        </p>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <select class="form-control" id="">
                                                    <option>Texte HCB</option>
                                                    <option>Autorisation</option>
                                                </select>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileHcb" lang="fr">
                                                <label class="custom-file-label" for="fileHcb">Ajouter un fichier</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Colonne droite-->
                                    <div class="col-md-5">
                                        <div id="carouselLieu" class="carousel slide" data-ride="carousel">
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

                                        <div class="input-group mb-3 mt-1">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileDescription">
                                                <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter une image</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-plus"></i>
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
                                        <p><a href="#" class="font-italic"><i class="fas fa-file-alt"></i> description.docx</a>&nbsp;&nbsp;<i class="fas fa-times text-danger"></i></p>

                                        <p><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> coloration_gram.pdf</a>&nbsp;&nbsp;<i class="fas fa-times text-danger"></i></p>

                                        <p><a href="#" class="font-italic"><i class="fas fa-file-alt text-success"></i> API.xls</a>&nbsp;&nbsp;<i class="fas fa-times text-danger"></i></p>

                                        <p><a href="#" class="font-italic"><i class="fas fa-file-alt text-warning"></i> rapport_analyse-2018.data</a>&nbsp;&nbsp;<i class="fas fa-times text-danger"></i></p>

                                        <p><a href="#" class="font-italic"><i class="fas fa-file-alt"></i> protocole.docx</a>&nbsp;&nbsp;<i class="fas fa-times text-danger"></i></p>

                                    </div>
                                    <!-- Droite -->
                                    <div class="col-xl-5">
                                        <div id="carouselBoite" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselBoite" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselBoite" data-slide-to="1"></li>
                                                <li data-target="#carouselBoite" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="https://via.placeholder.com/250" class="d-block w-100">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5>Photo sur boite</h5>
                                                        <p>Description 1</p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="https://via.placeholder.com/300" class="d-block w-100">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5>Photo microscopie</h5>
                                                        <p>Description 2</p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="https://via.placeholder.com/400" class="d-block w-100">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5>Photo sur boite</h5>
                                                        <p>Description 3</p>
                                                    </div>
                                                </div>
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
                                    <div class="input-group mb-3 mt-3 col-md-9">
                                        <div class="input-group-prepend">
                                            <input type="text" list="dataDescription" placeholder="Type..." class="form-control" id="">
                                            <datalist id="dataDescription">
                                                <option>Photo sur boite</option>
                                                <option>Photo microscopie</option>
                                                <option>Description</option>
                                                <option>Coloration Gram</option>
                                                <option>Galerie API</option>
                                                <option>Galerie Biolog</option>
                                            </datalist>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fileDescription">
                                            <label class="custom-file-label" for="fileDescription" data-browse="A">Ajouter un fichier </label>
                                        </div>
                                        <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-plus"></i>
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
                                            <th>Type</th>
                                            <th>Sequence</th>
                                            <th>Arbre Phylogénétique</th>
                                        </tr>
                                        <tr>
                                            <td>Un type</td>
                                            <td>
                                                <p>
                                                    <a href="#" class="font-italic"><i class="fas fa-file-alt"></i> description.docx</a>
                                                    &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> arbre.pdf</a>
                                                    &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                                </p>
                                            </td>
                                            <td>
                                                <i class="fas fa-pen"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Un autre type</td>
                                            <td>
                                                &nbsp;
                                            </td>
                                            <td>
                                                <p>
                                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> arbre.pdf</a>
                                                    &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                                </p>
                                            </td>
                                            <td>
                                                <i class="fas fa-pen"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Encore un type</td>
                                            <td>
                                                <p>
                                                    <a href="#" class="font-italic"><i class="fas fa-file-alt"></i> description.docx</a>
                                                    &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                                </p>
                                            </td>
                                            <td>
                                                &nbsp;
                                            </td>
                                            <td>
                                                <i class="fas fa-pen"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <input type="text" class="input-group" list="dataIdentification" placeholder="Type...">
                                            <datalist id="dataIdentification">
                                                <option>un type</option>
                                                <option>un autre type</option>
                                                <option>encore un type</option>
                                            </datalist>
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
                                                <label class="custom-file-label" for="customFile">Ajouter arbre</label>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="fas fa-check"></i>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Pasteur -->
                    <div class="card">
                        <div class="card-header" id="headingPasteur">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsePasteur" aria-expanded="false" aria-controls="collapsePasteur">
                                    Pasteur
                                </button>
                            </h2>
                        </div>
                        <div id="collapsePasteur" class="collapse" aria-labelledby="headingPasteur" data-parent="#accordionMenu">
                            <div class="card-body">
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
                                        <td data-toggle="collapse" data-target="collapseRow1">
                                            <p>1</p>
                                        </td>
                                        <td>
                                            <p>20/12/1997</p>
                                        </td>
                                        <td>
                                            <p>20121997</p>
                                        </td>
                                        <td>
                                            <p>
                                                <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> dépot.pdf</a>
                                                &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                            </p>
                                        </td>
                                        <td>2</td>
                                        <td>
                                            <i class="fas fa-pen"></i>
                                        </td>
                                    <tr id="collapseRow1" class="collapse in">
                                        <td colspan="2">
                                            <img width="70%" src="https://via.placeholder.com/250">
                                        </td>
                                        <td colspan="2">
                                            <p>
                                                <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> validation.pdf</a>
                                                &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                            </p>
                                        </td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>2</p>
                                        </td>
                                        <td>
                                            <p>20/12/1997</p>
                                        </td>
                                        <td>
                                            <p>20121997</p>
                                        </td>
                                        <td>
                                            <p>
                                                <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> dépot.pdf</a>
                                                &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                            </p>
                                        </td>
                                        <td>2</td>
                                        <td>
                                            <i class="fas fa-pen"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <input class="form-control" type="date" class="input-group">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" class="input-group">
                                        </td>
                                        <td>
                                            <div class="custom-file text-left">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Ajouter</label>
                                            </div>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" class="input-group">
                                        </td>
                                        <td>
                                            <i class="fas fa-check"></i>
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
                                <table class="table table-sm text-center table-hover">
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
                                    <tr>
                                        <td>
                                            <p>1</p>
                                        </td>
                                        <td>
                                            <p>Brevet</p>
                                        </td>
                                        <td>
                                            <p>20/12/1997</p>
                                        </td>
                                        <td>
                                            <p>Cosmétique</p>
                                        </td>
                                        <td>
                                            <p>
                                                <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte.pdf</a>
                                                &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> inpi.pdf</a>
                                                &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                            </p>
                                        </td>
                                        <td>
                                            <i class="fas fa-pen"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>2</p>
                                        </td>
                                        <td>
                                            <p>Soleau</p>
                                        </td>
                                        <td>
                                            <p>20/12/1997</p>
                                        </td>
                                        <td>
                                            <p>Médicale</p>
                                        </td>
                                        <td>
                                            <p>
                                                <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> dépot.pdf</a>
                                                &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                            </p>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <i class="fas fa-pen"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <select class="form-control form-control-sm">
                                                <option>Brevet</option>
                                                <option>Soleau</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control form-control-sm" type="text" class="input-group">
                                        </td>
                                        <td>
                                            <input class="form-control form-control-sm" type="text" class="input-group" list="dataSecteur">
                                            <datalist id="dataSecteur">
                                                <option>Cosmétique</option>
                                                <option>Médicale</option>
                                            </datalist>
                                        </td>
                                        <td>
                                            <div class="custom-file text-left form-control-sm">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-file text-left form-control-sm">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="fas fa-check"></i>
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
                                        <th>Fiche</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>20/12/1997</td>
                                        <td>
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> document.pdf</a>
                                            &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                        </td>
                                        <td>
                                            <i class="fas fa-pen"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <input class="form-control" type="date">
                                        </td>
                                        <td>
                                            <div class="custom-file text-left">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="fas fa-check"></i>
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
                                    <tr>
                                        <td>1</td>
                                        <td>20/12/1997</td>
                                        <td>15/01/2019</td>
                                        <td>EDF</td>
                                        <td>Médicale</td>
                                        <td>
                                            <i class="fas fa-pen"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <input class="form-control" type="text">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" list="dataPart">
                                            <datalist id="dataPart">
                                                <option>EDF</option>
                                                <option>L'oréal</option>
                                            </datalist>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" class="input-group" list="dataSecteur">
                                            <datalist id="dataSecteur">
                                                <option>Cosmétique</option>
                                                <option>Médicale</option>
                                            </datalist>
                                        </td>
                                        <td>
                                            <i class="fas fa-check"></i>
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
                                    <tr>
                                        <td>1</td>
                                        <td>20/12/1997</td>
                                        <td>EDF</td>
                                        <td>Médicale</td>
                                        <td>
                                            <p>
                                                <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte.pdf</a>
                                                &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                            </p>
                                        </td>
                                        <td>
                                            <i class="fas fa-pen"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <input class="form-control" type="text">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" list="dataPart">
                                            <datalist id="dataPart">
                                                <option>EDF</option>
                                                <option>L'oréal</option>
                                            </datalist>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" class="input-group" list="dataSecteur">
                                            <datalist id="dataSecteur">
                                                <option>Cosmétique</option>
                                                <option>Médicale</option>
                                            </datalist>
                                        </td>
                                        <td>
                                            <div class="custom-file text-left">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="fas fa-check"></i>
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

        <div class="m-3">
            <nav>
                <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Synthèse Eps</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Synthèse Pha</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Synthèse autre</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active bg-white border rounded p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div>
                        <!-- Filtre affichage -->
                        <div>
                            <h6>Afficher :</h6>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkCaracterisation" checked>
                                    <label class="form-check-label" for="checkCaracterisation">Caractérisation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkObjectivation" checked>
                                    <label class="form-check-label" for="checkObjectivation">Objectivation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkCondition" checked>
                                    <label class="form-check-label" for="checkCondition">Condition de culture</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkCriblage" checked>
                                    <label class="form-check-label" for="checkCriblage">Criblage</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkProductionIndu" checked>
                                    <label class="form-check-label" for="checkProductionIndu">Production Industriel</label>
                                </div>
                            </div>
                            <hr class="w-75">
                        </div>

                        <!-- Projet -->
                        <div class="">
                            <ul class="list-inline">
                                <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
                                <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet1.pdf</a></li>
                                <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet2.pdf</a></li>
                                <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet3.pdf</a></li>
                                <li class="list-inline-item">
                                    <input class="form-control w-75 d-inline" type="text" list="dataProjet">
                                    <datalist id="dataProjet">
                                        <option>projet1</option>
                                        <option>projet2</option>
                                        <option>projet3</option>
                                    </datalist>
                                    &nbsp;<i class="fas fa-check d-inline"></i>
                                </li>
                            </ul>
                            <hr class="w-75">
                        </div>

                        <!-- Carac -->
                        <div>
                            <h4>Caractérisation n°1</h4>
                            <hr class="w-50" align="left">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4 font-italic">
                                            <h6>Oses neutres :</h6>
                                            <div class="button-group d-inline-block">
                                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Ajouter...</button>
                                                <ul class="dropdown-menu p-3 pre-scrollable">
                                                    <li>
                                                        <input class="form-control w-75" type="text">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 1</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 2</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 3</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 4</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 5</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 6</label>
                                                        <input type="checkbox">
                                                    </li>
                                                </ul>
                                            </div>
                                            <i class="fas fa-plus"></i>

                                            <ul class="list-unstyled mt-3 ">
                                                <li>Glucose&nbsp;<i class="fas fa-trash-alt"></i></li>
                                                <li>Galactose&nbsp;<i class="fas fa-trash-alt"></i></li>
                                                <li>Mannose&nbsp;<i class="fas fa-trash-alt"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 font-italic">
                                            <h6>Oses acides :</h6>
                                            <div class="button-group d-inline-block">
                                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Ajouter...</button>
                                                <ul class="dropdown-menu p-3 pre-scrollable">
                                                    <li>
                                                        <input class="form-control w-75" type="text">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 1</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 2</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 3</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 4</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 5</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 6</label>
                                                        <input type="checkbox">
                                                    </li>
                                                </ul>
                                            </div>
                                            <i class="fas fa-plus"></i>

                                            <ul class="list-unstyled mt-3">
                                                <li>Acide glucuronique&nbsp;<i class="fas fa-trash-alt"></i></li>
                                                <li>Acide galacturonique&nbsp;<i class="fas fa-trash-alt"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 font-italic">
                                            <h6>Osamines :</h6>
                                            <div class="button-group d-inline-block">
                                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Ajouter...</button>
                                                <ul class="dropdown-menu p-3 pre-scrollable">
                                                    <li>
                                                        <input class="form-control w-75" type="text">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 1</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 2</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 3</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 4</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 5</label>
                                                        <input type="checkbox">
                                                    </li>
                                                    <li>
                                                        <label>&nbsp;Option 6</label>
                                                        <input type="checkbox">
                                                    </li>
                                                </ul>
                                            </div>
                                            <i class="fas fa-plus"></i>

                                            <ul class="list-unstyled mt-3">
                                                <li>Glucosamine&nbsp;<i class="fas fa-trash-alt"></i></li>
                                                <li>Galactosamine&nbsp;<i class="fas fa-trash-alt"></i></li>
                                            </ul>
                                        </div>

                                        <div class="input-group col-8 text-left">
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
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <ul class="list-unstyled ">
                                        <li class="m-1">
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-primary"></i> Substituant.docx</a>
                                        </li>
                                        <li class="m-1">
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> ratio.pdf</a>
                                        </li>
                                        <li class="m-1">
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-warning"></i> rmn.data</a>
                                        </li>
                                        <li class="m-1">
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-warning"></i> spectreRmn.data</a>
                                        </li>
                                        <li class="m-1">
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-secondary"></i> spectre.png</a>
                                        </li>
                                        <li class="m-1">
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-secondary"></i> spectre HPLC.png</a>
                                        </li>
                                        <li class="m-1">
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-success"></i> tableau.xls</a>
                                        </li>
                                        <li class="m-1">
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-success"></i> planning.xls</a>
                                        </li>
                                        <li class="m-1">
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte.pdf</a>
                                        </li>
                                        <li class="m-1">
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> scan.pdf</a>
                                        </li>
                                        <li class="m-1">
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-primary"></i> formulaire.docx</a>
                                        </li>
                                        <li class="m-1">
                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet1.pdf</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Objecti -->
                        <div>
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
                                <tr>
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
                                        <i class="fas fa-check"></i>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- Projet Indu -->
                        <div>
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
                                <tr>
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
                                        <i class="fas fa-check"></i>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- Criblage -->
                        <div>
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
                                                            &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> rapport.pdf</a>
                                                            &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <i class="fas fa-pen"></i>
                                                    </td>
                                                </tr>
                                                <tr>
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
                                                        <i class="fas fa-check"></i>
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
                    <div class="input-group col-4">
                        <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                            <option></option>
                            <option>Caractérisation</option>
                            <option>Condition de culture</option>
                            <option>Criblage</option>
                            <option>Production industriel</option>
                            <option>Objectivation</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="button"><i class="fas fa-plus"></i>&nbsp;Ajouter</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade bg-white border rounded p-2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div>
                        <!-- Filtre affichage -->
                        <div>
                            <h6>Afficher :</h6>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkCaracterisation" checked>
                                    <label class="form-check-label" for="checkCaracterisation">Caractérisation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkObjectivation" checked>
                                    <label class="form-check-label" for="checkObjectivation">Objectivation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkCondition" checked>
                                    <label class="form-check-label" for="checkCondition">Condition de culture</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkCriblage" checked>
                                    <label class="form-check-label" for="checkCriblage">Criblage</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkProductionIndu" checked>
                                    <label class="form-check-label" for="checkProductionIndu">Production Industriel</label>
                                </div>
                            </div>
                            <hr class="w-75">
                        </div>

                        <!-- Projet -->
                        <div class="">
                            <ul class="list-inline">
                                <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
                                <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet1.pdf</a></li>
                                <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet2.pdf</a></li>
                                <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet3.pdf</a></li>
                                <li class="list-inline-item">
                                    <input class="form-control w-75 d-inline" type="text" list="dataProjet">
                                    <datalist id="dataProjet">
                                        <option>projet1</option>
                                        <option>projet2</option>
                                        <option>projet3</option>
                                    </datalist>
                                    &nbsp;<i class="fas fa-check d-inline"></i>
                                </li>
                            </ul>
                            <hr class="w-75">
                        </div>

                        <!-- Carac -->
                        <div>
                            <h4>Caractérisation n°1</h4>
                            <hr class="w-50" align="left">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-primary"></i> Substituant.docx</a>
                                </li>
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> ratio.pdf</a>
                                </li>
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-warning"></i> rmn.data</a>
                                </li>
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-warning"></i> spectreRmn.data</a>
                                </li>
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-secondary"></i> spectre.png</a>
                                </li>
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-secondary"></i> spectre HPLC.png</a>
                                </li>
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-success"></i> tableau.xls</a>
                                </li>
                            </ul>
                            <div class="input-group col-8 text-left">
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
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                            <br>
                        </div>

                        <!-- Objecti -->
                        <div>
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
                                <tr>
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
                                        <i class="fas fa-check"></i>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- Projet Indu -->
                        <div>
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
                                <tr>
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
                                        <i class="fas fa-check"></i>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- Criblage -->
                        <div>
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
                                                        &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> rapport.pdf</a>
                                                        &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                                    </p>
                                                </td>
                                                <td>
                                                    <i class="fas fa-pen"></i>
                                                </td>
                                            </tr>
                                            <tr>
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
                                                    <i class="fas fa-check"></i>
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
                    <div class="input-group col-4">
                        <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                            <option></option>
                            <option>Caractérisation</option>
                            <option>Condition de culture</option>
                            <option>Criblage</option>
                            <option>Production industriel</option>
                            <option>Objectivation</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="button"><i class="fas fa-plus"></i>&nbsp;Ajouter</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade bg-white border rounded p-2" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div>
                        <!-- Filtre affichage -->
                        <div>
                            <h6>Afficher :</h6>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkCaracterisation" checked>
                                    <label class="form-check-label" for="checkCaracterisation">Caractérisation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkObjectivation" checked>
                                    <label class="form-check-label" for="checkObjectivation">Objectivation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkCondition" checked>
                                    <label class="form-check-label" for="checkCondition">Condition de culture</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkCriblage" checked>
                                    <label class="form-check-label" for="checkCriblage">Criblage</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkProductionIndu" checked>
                                    <label class="form-check-label" for="checkProductionIndu">Production Industriel</label>
                                </div>
                            </div>
                            <hr class="w-75">
                        </div>

                        <!-- Projet -->
                        <div class="">
                            <ul class="list-inline">
                                <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
                                <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet1.pdf</a></li>
                                <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet2.pdf</a></li>
                                <li class="list-inline-item"><a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> texte_projet3.pdf</a></li>
                                <li class="list-inline-item">
                                    <input class="form-control w-75 d-inline" type="text" list="dataProjet">
                                    <datalist id="dataProjet">
                                        <option>projet1</option>
                                        <option>projet2</option>
                                        <option>projet3</option>
                                    </datalist>
                                    &nbsp;<i class="fas fa-check d-inline"></i>
                                </li>
                            </ul>
                            <hr class="w-75">
                        </div>

                        <!-- Carac -->
                        <div>
                            <h4>Caractérisation n°1</h4>
                            <hr class="w-50" align="left">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-primary"></i> Substituant.docx</a>
                                </li>
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> ratio.pdf</a>
                                </li>
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-warning"></i> rmn.data</a>
                                </li>
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-warning"></i> spectreRmn.data</a>
                                </li>
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-secondary"></i> spectre.png</a>
                                </li>
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-secondary"></i> spectre HPLC.png</a>
                                </li>
                                <li class="list-inline-item m-1">
                                    <a href="#" class="font-italic"><i class="fas fa-file-alt text-success"></i> tableau.xls</a>
                                </li>
                            </ul>
                            <div class="input-group col-8 text-left">
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
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                            <br>
                        </div>

                        <!-- Objecti -->
                        <div>
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
                                <tr>
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
                                        <i class="fas fa-check"></i>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- Projet Indu -->
                        <div>
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
                                <tr>
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
                                        <i class="fas fa-check"></i>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- Criblage -->
                        <div>
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
                                                        &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <a href="#" class="font-italic"><i class="fas fa-file-alt text-danger"></i> rapport.pdf</a>
                                                        &nbsp;&nbsp;<i class="fas fa-times text-danger"></i>
                                                    </p>
                                                </td>
                                                <td>
                                                    <i class="fas fa-pen"></i>
                                                </td>
                                            </tr>
                                            <tr>
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
                                                    <i class="fas fa-check"></i>
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
                    <div class="input-group col-4">
                        <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                            <option></option>
                            <option>Caractérisation</option>
                            <option>Condition de culture</option>
                            <option>Criblage</option>
                            <option>Production industriel</option>
                            <option>Objectivation</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="button"><i class="fas fa-plus"></i>&nbsp;Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection