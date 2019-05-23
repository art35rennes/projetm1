@extends('layout')
@section('customCss')

@endsection

@section('body')
    @if($user->utilisateur == 3)
    <div class="container-fluid">
        <h4 class="display-4 mb-3">Gestion des accréditations</h4>
        <form method="post" action="/user/accreditation/maj" id="majForm">
            <table class="table table-sm text-center table-responsive">
                <thead>
                <tr>
                    <th colspan="2"></th>
                    <th colspan="3" class="text-center">Synthèse</th>
                    <th colspan="6"></th>
                </tr>
                <tr>
                    <th>Nom</th>
                    <th>Identification</th>
                    <th class="font-italic font-weight-normal">EPS</th>
                    <th class="font-italic font-weight-normal">PHA</th>
                    <th class="font-italic font-weight-normal">Autre</th>
                    <th>Pasteur</th>
                    <th>Brevet</th>
                    <th>Exclusivité</th>
                    <th>Publication</th>
                    <th>Utilisateur</th>
                    <th>Cryotube</th>
                    <th>Description</th>
                    <th>Projet</th>
                    <th>Accréditation</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($accreditations['accreditation'] as $accreditation)
                <tr>
                    <td class="font-weight-bold">{{$accreditation->nom}}</td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation[{{$accreditation->id}}][identification]" class="custom-select-sm text-center">
                            <option @if ($accreditation->identification == 0) selected @endif value="0">-</option>
                            <option @if ($accreditation->identification == 1) selected @endif value="1">l</option>
                            <option @if ($accreditation->identification == 2) selected @endif value="2">l+a</option>
                            <option @if ($accreditation->identification == 3) selected @endif value="3">l+a+e</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation[{{$accreditation->id}}][eps]" class="custom-select-sm text-center">
                            <option @if ($accreditation->eps == 0) selected @endif value="0">-</option>
                            <option @if ($accreditation->eps == 1) selected @endif value="1">l</option>
                            <option @if ($accreditation->eps == 2) selected @endif value="2">l+a</option>
                            <option @if ($accreditation->eps == 3) selected @endif value="3">l+a+e</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation[{{$accreditation->id}}][pha]" class="custom-select-sm text-center">
                            <option @if ($accreditation->pha == 0) selected @endif value="0">-</option>
                            <option @if ($accreditation->pha == 1) selected @endif value="1">l</option>
                            <option @if ($accreditation->pha == 2) selected @endif value="2">l+a</option>
                            <option @if ($accreditation->pha == 3) selected @endif value="3">l+a+e</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation[{{$accreditation->id}}][autre]" class="custom-select-sm text-center">
                            <option @if ($accreditation->autre == 0) selected @endif value="0">-</option>
                            <option @if ($accreditation->autre == 1) selected @endif value="1">l</option>
                            <option @if ($accreditation->autre == 2) selected @endif value="2">l+a</option>
                            <option @if ($accreditation->autre == 3) selected @endif value="3">l+a+e</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation[{{$accreditation->id}}][pasteur]" class="custom-select-sm text-center">
                            <option @if ($accreditation->pasteur == 0) selected @endif value="0">-</option>
                            <option @if ($accreditation->pasteur == 1) selected @endif value="1">l</option>
                            <option @if ($accreditation->pasteur == 2) selected @endif value="2">l+a</option>
                            <option @if ($accreditation->pasteur == 3) selected @endif value="3">l+a+e</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation[{{$accreditation->id}}][brevet]" class="custom-select-sm text-center">
                            <option @if ($accreditation->brevet == 0) selected @endif value="0">-</option>
                            <option @if ($accreditation->brevet == 1) selected @endif value="1">l</option>
                            <option @if ($accreditation->brevet == 2) selected @endif value="2">l+a</option>
                            <option @if ($accreditation->brevet == 3) selected @endif value="3">l+a+e</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation[{{$accreditation->id}}][exclusivite]" class="custom-select-sm text-center">
                            <option @if ($accreditation->exclusivite == 0) selected @endif value="0">-</option>
                            <option @if ($accreditation->exclusivite == 1) selected @endif value="1">l</option>
                            <option @if ($accreditation->exclusivite == 2) selected @endif value="2">l+a</option>
                            <option @if ($accreditation->exclusivite == 3) selected @endif value="3">l+a+e</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation[{{$accreditation->id}}][publication]" class="custom-select-sm text-center">
                            <option @if ($accreditation->publication == 0) selected @endif value="0">-</option>
                            <option @if ($accreditation->publication == 1) selected @endif value="1">l</option>
                            <option @if ($accreditation->publication == 2) selected @endif value="2">l+a</option>
                            <option @if ($accreditation->publication == 3) selected @endif value="3">l+a+e</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation[{{$accreditation->id}}][brevet]" class="custom-select-sm text-center">
                            <option @if ($accreditation->brevet == 0) selected @endif value="0">-</option>
                            <option @if ($accreditation->brevet == 1) selected @endif value="1">l</option>
                            <option @if ($accreditation->brevet == 3) selected @endif value="3">l+a+e</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation[{{$accreditation->id}}][exclusivite]" class="custom-select-sm text-center">
                            <option @if ($accreditation->exclusivite == 0) selected @endif value="0">-</option>
                            <option @if ($accreditation->exclusivite == 1) selected @endif value="1">l</option>
                            <option @if ($accreditation->exclusivite == 2) selected @endif value="2">l+a</option>
                            <option @if ($accreditation->exclusivite == 3) selected @endif value="3">l+a+e</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation[{{$accreditation->id}}][publication]" class="custom-select-sm text-center">
                            <option @if ($accreditation->publication == 0) selected @endif value="0">-</option>
                            <option @if ($accreditation->publication == 1) selected @endif value="1">l</option>
                            <option @if ($accreditation->publication == 2) selected @endif value="2">l+a</option>
                            <option @if ($accreditation->publication == 3) selected @endif value="3">l+a+e</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation[{{$accreditation->id}}][utilisateur]" class="custom-select-sm text-center">
                            <option @if ($accreditation->utilisateur == 0) selected @endif value="0">-</option>
                            <option @if ($accreditation->utilisateur == 1) selected @endif value="1">l</option>
                            <option @if ($accreditation->utilisateur == 2) selected @endif value="2">l+a</option>
                            <option @if ($accreditation->utilisateur == 3) selected @endif value="3">l+a+e</option>
                        </select>
                    </td>
                    <td>
                        <input readonly type="number" size="3" name="accreditation[{{$accreditation->id}}][souche]" class="form-control-sm form-control" value="{{$accreditation->souche}}">
                    </td>
                    <td>
                        <i class="fas fa-pen "></i>
                        <i class="fas fa-check faForm"></i>
                    </td>
                    <td>
                        <form method="post" action="/user/accreditation/delete" id="deleteAccred">
                            @csrf
                            <input type="hidden" value="{{$accreditation->id}}" name="id_accred">
                            <i class="fas fa-trash"></i>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <h6>Explication des symboles</h6>
                <ul>
                    <li>- : aucun droit</li>
                    <li>l : droit de lecture</li>
                    <li>l+a : droit de lecture et d'ajout</li>
                    <li>l+a+e : droit de lecture, d'ajout et d'édition</li>
                </ul>
            </div>
        </form>
        <form method="post" action="/user/accreditation/ajout" class="m-3">
            @csrf
            <hr class="m-3">
            <h5>Ajouter une nouvelle accréditation</h5>

            <div class="row p-2">
                <!--Nom-->
                <div class="form-group p-2 ">
                    <h6 for="nom">Nom:</h6>
                    <input type="text" class="form-control" name="accreditation[nom]" placeholder="Nom" required>
                </div>
                <div class="form-group col-md-3 p-2">
                    <h6 for="accreditation[souche]">Niveau d'accréditation souche</h6>
                    <input type="number" class="form-control" name="accreditation[souche]" value="0" required>
                </div>
            </div>
            <!--Droits-->
            <div class="form-group p-2">
                <h6 for="">Liste des droits:</h6>
                <div class="row">
                    <div class="col-auto">
                        <div class="form-check form-inline">
                            <select name="accreditation[identification]" class="custom-select-sm mr-2">
                                <option value="0">-</option>
                                <option value="1">lecture</option>
                                <option value="2">lecture + ajout</option>
                                <option value="3">lecture + ajout + edition</option>
                            </select>
                            <label class="form-check-label" for="accreditation[identification]">Identification</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation[eps]" class="custom-select-sm mr-2">
                                <option value="0">-</option>
                                <option value="1">lecture</option>
                                <option value="2">lecture + ajout</option>
                                <option value="3">lecture + ajout + edition</option>
                            </select>
                            <label class="form-check-label" for="accreditation[eps]">Synthése EPS</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation[pha]" class="custom-select-sm mr-2">
                                <option value="0">-</option>
                                <option value="1">lecture</option>
                                <option value="2">lecture + ajout</option>
                                <option value="3">lecture + ajout + edition</option>
                            </select>
                            <label class="form-check-label" for="accreditation[pha]">Synthése PHA</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation[autre]" class="custom-select-sm mr-2">
                                <option value="0">-</option>
                                <option value="1">lecture</option>
                                <option value="2">lecture + ajout</option>
                                <option value="3">lecture + ajout + edition</option>
                            </select>
                            <label class="form-check-label" for="accreditation[autre]">Synthése Autre</label>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="form-check">
                            <select name="accreditation[pasteur]" class="custom-select-sm mr-2">
                                <option value="0">-</option>
                                <option value="1">lecture</option>
                                <option value="2">lecture + ajout</option>
                                <option value="3">lecture + ajout + edition</option>
                            </select>
                            <label class="form-check-label" for="accreditation[pasteur]">Pasteur</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation[brevet]" class="custom-select-sm mr-2">
                                <option value="0">-</option>
                                <option value="1">lecture</option>
                                <option value="2">lecture + ajout</option>
                                <option value="3">lecture + ajout + edition</option>
                            </select>
                            <label class="form-check-label" for="accreditation[brevet]">Brevet</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation[exclusivite]" class="custom-select-sm mr-2">
                                <option value="0">-</option>
                                <option value="1">lecture</option>
                                <option value="2">lecture + ajout</option>
                                <option value="3">lecture + ajout + edition</option>
                            </select>
                            <label class="form-check-label" for="accreditation[exclusivite]">Exclusivité</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation[publication]" class="custom-select-sm mr-2">
                                <option value="0">-</option>
                                <option value="1">lecture</option>
                                <option value="2">lecture + ajout</option>
                                <option value="3">lecture + ajout + edition</option>
                            </select>
                            <label class="form-check-label" for="accreditation[publication]">Publication</label>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="form-check">
                            <select name="accreditation[utilisateur]" class="custom-select-sm mr-2">
                                <option value="0">-</option>
                                <option value="1">lecture</option>
                                <option value="2">lecture + ajout</option>
                                <option value="3">lecture + ajout + edition</option>
                            </select>
                            <label class="form-check-label" for="accreditation[utilisateur]">Gestion utilisateur</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation[description]" class="custom-select-sm mr-2">
                                <option value="0">-</option>
                                <option value="1">lecture</option>
                                <option value="2">lecture + ajout</option>
                                <option value="3">lecture + ajout + edition</option>
                            </select>
                            <label class="form-check-label" for="accreditation[description]">Description</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation[projet]" class="custom-select-sm mr-2">
                                <option value="0">-</option>
                                <option value="1">lecture</option>
                                <option value="2">lecture + ajout</option>
                                <option value="3">lecture + ajout + edition</option>
                            </select>
                            <label class="form-check-label" for="accreditation[projet]">Projet</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation[cryotube]" class="custom-select-sm mr-2">
                                <option value="0">-</option>
                                <option value="1">lecture</option>
                                <option value="2">lecture + ajout</option>
                                <option value="3">lecture + ajout + edition</option>
                            </select>
                            <label class="form-check-label" for="accreditation[cryotube]">Cryotube</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
        </form>




    </div>
    @else
        <div class="container m-5">
            <h4 class="display-4">Vous n'êtes pas authorisé à acceder à cette page.</h4>
        </div>
    @endif
@endsection

@section('customJs')
    <script type="text/javascript" src="{{ URL::asset('js/user.js') }}"></script>
@endsection