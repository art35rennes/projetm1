@extends('layout')

@section('body')
    <br>
    <div class="container">
        <h4 class="display-4">Souche n°2012</h4>
        <div class="custom-control custom-checkbox text-sm-right mb-2">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">Mode Edition</label>
            <i class="fas fa-pen"></i>
        </div>
        <div class="row">
            <!-- Colonne Gauche -->
            <div class="col-xl-4 bg-light">
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
            </div>

            <!-- Colonne Droite -->
            <div class="col-xl-8 bg-light">
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
                        <div id="collapseProjet" class="collapse show" aria-labelledby="headingProjet" data-parent="#accordionMenu">
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

                    <!-- EPS -->
                    <div class="card">
                        <div class="card-header" id="headingEps">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEps" aria-expanded="false" aria-controls="collapseEps">
                                    Synthèse Eps
                                </button>
                            </h2>
                        </div>
                        <div id="collapseEps" class="collapse" aria-labelledby="headingEps" data-parent="#accordionMenu">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
                        <div id="collapsePha" class="collapse" aria-labelledby="headingPha" data-parent="#accordionMenu">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
                        <div id="collapseAutre" class="collapse" aria-labelledby="headingAutre" data-parent="#accordionMenu">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>

    </div>
@endsection