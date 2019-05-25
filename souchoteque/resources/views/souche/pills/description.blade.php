<div class="tab-pane fade show active p-3" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">

    @if($user->description > 0)
    <div>
        <div class="custom-control custom-checkbox text-sm-right mt-2">
            <input type="checkbox" class="custom-control-input editMode" id="editModeDescription">
            <label class="custom-control-label" for="editModeDescription">Mode Edition</label>
            <i class="fas fa-pen"></i>
            <small class="form-text text-muted editZone">N'oubliez pas d'enregistrer les modifications</small>
        </div>
        <button class="btn float-right m-2 btn-warning editZone annulBtn">Annuler les modifications</button>
        <button class="btn float-right m-2 btn-success editZone updateBtn">Valider les modifications</button><br>
    </div>
    <br>
    @endif

    <div class="mt-5 row">
        <div class="col-4 pt-2">

            <div id="carouselSouche" class="carousel slide mb-2" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($souche['photo_souche'] as $photo)
                        <li data-target="#carouselSouche" data-slide-to="{{$loop->index}}" @if($loop->index==0) class="active" @endif></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($souche['photo_souche'] as $photo)
                        <div class="carousel-item @if($loop->index==0) active @endif">
                            <img src="@if(file_exists("/storage/{{$photo->fichier}}")) /storage/{{$photo->fichier}} @else https://via.placeholder.com/600 @endif" class="d-block w-100">
                            @if(!file_exists("/storage/{{$photo->fichier}}"))
                            <div class="carousel-caption d-none d-md-block">
                                <p class="bg-light text-danger font-weight-bold text-sm-center">Could not find file</p>
                            </div>
                            @endif
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
            @if($user->description > 1)
            <div class="editZone">
                <h6>Ajouter une photo :</h6>
                <div class="form-group">
                    <label for="photo_souche-description">Description:</label>
                    <textarea class="form-control" id="photo_souche-description" rows="3" name="photo_souche-description"></textarea>
                </div>
                <label class="btn btn-light">
                    Ajouter une image <input type="file" name="photo_souche-fichier" id="photo_souche-fichier" hidden>
                </label>
            </div>
            @endif

            @if($user->cryotube > 0)
            <h5 class="mt-2">Stock Cryotube :</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span class="badge badge-primary badge-pill mr-1">{{$souche['souche'][0]->stock}}</span>Polymaris
                    @if($user->cryotube == 3)
                    <span class="float-right editZone">
                        <i class="fas fa-minus mr-1 cryoBtn"></i>
                        <i class="fas fa-plus ml-1 cryoBtn"></i>
                        <input type="hidden" class="cryoRef" value="Polymaris">
                    </span>
                    @endif
                </li>
                @foreach($souche['pasteur'] as $p)
                <li class="list-group-item">
                    <span class="badge badge-primary badge-pill mr-1">{{$p->stock}}</span>Pasteur n°{{$p->numero}}
                    @if($user->cryotube == 3)
                    <span class="float-right editZone">
                        <i class="fas fa-minus mr-1 cryoBtn"></i>
                        <i class="fas fa-plus ml-1 cryoBtn"></i>
                        <input type="hidden" class="cryoRef" value="{{$p->numero}}">
                    </span>
                    @endif
                </li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="col-4">
            <div class="col-xl-7">
                <h6>Fichier descriptif:</h6>
                @foreach($souche['description'] as $file)
                <p>
                    <a href="{{asset("/storage/".$file->fichier)}}" class="font-italic">{{$file->texte}}</a>
                    @if($user->description == 3) <i class='editButton fas fa-trash ml-2' onclick='fileDelete("{{asset('/storage/'.$file->fichier)}}")'></i> @endif
                </p>
                @endforeach
                <div class="input-group mb-3 mt-3 editZone">
                    <h6>Ajouter un fichier:</h6>
                    <div class="input-group">
                        <input type="text" list="dataDescription" placeholder="Nom..." class="form-control" name="description-texte" id="description-texte">
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
                    <label class="btn btn-light mt-2">
                        Ajouter un fichier <input type="file" name="description-file" id="description-file" hidden>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-4 border-left">

            <h6>Lieu de collecte : <span class="font-weight-normal inputText" id="souche-origine">@isset($souche['souche'][0]){{$souche['souche'][0]->origine}}@endisset</span></h6>
            <h6>Année de collecte : <span class="font-weight-normal inputDate" id="souche-annee_collecte">@isset($souche['souche'][0]){{$souche['souche'][0]->annee_collecte}}@endisset</span></h6>
            <hr>

            <h6>Souche OGM : <span class="font-weight-normal inputYn" id="isOgm">@if($souche['souche'][0]->annee_creation) Oui @else Non @endif </span></h6>
            <h6>Année de création : <span class="font-weight-normal inputDate" id="souche-annee_creation">@isset($souche['souche'][0]){{$souche['souche'][0]->annee_creation}}@endisset</span></h6>
            <ul>
                @isset($souche['souche'][0]->validation_hcb)
                <li>
                    <i class="mt-3 fas fa-file-alt text-danger mr-2"></i>
                    <a href="{{asset("/storage/".$souche['souche'][0]->validation_hcb)}}" class="font-italic">Validation HCB</a>
                    @if($user->description == 3) <i class='fas fa-trash ml-2 editButton' onclick='fileDelete("{{asset('/storage/'.$souche['souche'][0]->validation_hcb)}}")'></i> @endif
                </li>
                @endisset
                @isset($souche['souche'][0]->texte_hcb)
                <li>
                    <i class="fas fa-file-alt text-danger mr-2"></i>
                    <a href="{{asset("/storage/".$souche['souche'][0]->texte_hcb)}}" class="font-italic">Texte HCB</a>
                    @if($user->description == 3) <i class='fas fa-trash ml-2 editButton' onclick='fileDelete("{{asset('/storage/'.$souche['souche'][0]->texte_hcb)}}")'></i> @endif
                </li>
                @endisset
                @isset($souche['souche'][0]->schema_plasmique)
                    <li>
                        <i class="mb-3 fas fa-file-alt text-danger mr-2"></i>
                        <a href="{{asset("/storage/".$souche['souche'][0]->schema_plasmique)}}" class="font-italic">Schéma plasmique</a>
                        @if($user->description == 3) <i class='fas fa-trash ml-2 editButton' onclick='fileDelete("{{asset('/storage/'.$souche['souche'][0]->schema_plasmique)}}")'></i> @endif
                    </li>
                @endisset
            </ul>

            @if($user->description > 1)
            <div class="editZone mt-3">
                <h6>Ajouter un fichier</h6>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="souche-hcb-type1" name="souche-hcb-type" value="texte_hcb">
                    <label class="custom-control-label" for="souche-hcb-type1">Texte HCB</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="souche-hcb-type2" name="souche-hcb-type" value="validation_hcb">
                    <label class="custom-control-label" for="souche-hcb-type2">Autorisation HCB</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="souche-hcb-type3" name="souche-hcb-type" value="shema_plasmique">
                    <label class="custom-control-label" for="souche-hcb-type3">Schéma plasmique</label>
                </div>
                <label class="btn btn-light mt-2">
                    Ajouter un fichier <input type="file" name="souche-hcb-doc" id="souche-hcb-doc" hidden>
                </label>
            </div>
            @endif
        </div>
    </div>
</div>