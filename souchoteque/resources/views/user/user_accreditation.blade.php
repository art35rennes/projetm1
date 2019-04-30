@extends('layout')
@section('customCss')

@endsection

@section('body')
    <div class="container bg-light">
        <h4 class="display-4 mb-3">Gestion des accréditations</h4>
        <form method="post" action="/user/accreditation/maj" id="majForm">
            <table class="table table-sm text-center">
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
                    <th>Accréditation</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($accreditations['accreditation'] as $accreditation)
                <tr>
                    <td class="font-weight-bold">{{$accreditation->nom}}<input type="hidden" value="{{$accreditation->niveau}}" id="accreditation-{{$accreditation->id}}"></td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation-{{$accreditation->id}}-0" class="custom-select-sm text-center">
                            <option value="000">-</option>
                            <option value="001">r</option>
                            <option value="011">ra</option>
                            <option value="111">raw</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation-{{$accreditation->id}}-1" class="custom-select-sm text-center">
                            <option value="000">-</option>
                            <option value="001">r</option>
                            <option value="011">ra</option>
                            <option value="111">raw</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation-{{$accreditation->id}}-2" class="custom-select-sm text-center">
                            <option value="000">-</option>
                            <option value="001">r</option>
                            <option value="011">ra</option>
                            <option value="111">raw</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation-{{$accreditation->id}}-3" class="custom-select-sm text-center">
                            <option value="000">-</option>
                            <option value="001">r</option>
                            <option value="011">ra</option>
                            <option value="111">raw</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation-{{$accreditation->id}}-4" class="custom-select-sm text-center">
                            <option value="000">-</option>
                            <option value="001">r</option>
                            <option value="011">ra</option>
                            <option value="111">raw</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation-{{$accreditation->id}}-5" class="custom-select-sm text-center">
                            <option value="000">-</option>
                            <option value="001">r</option>
                            <option value="011">ra</option>
                            <option value="111">raw</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation-{{$accreditation->id}}-6" class="custom-select-sm text-center">
                            <option value="000">-</option>
                            <option value="001">r</option>
                            <option value="011">ra</option>
                            <option value="111">raw</option>
                        </select>
                    </td>
                    <td>
                        <select disabled class="selectLaw" name="accreditation-{{$accreditation->id}}-7" class="custom-select-sm text-center">
                            <option value="000">-</option>
                            <option value="001">r</option>
                            <option value="011">ra</option>
                            <option value="111">raw</option>
                        </select>
                    </td>
                    <td>
                        <input readonly type="number" size="3" name="accreditation-{{$accreditation->id}}-10" class="form-control-sm form-control" value="{{$accreditation->souche}}">
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
        </form>
        <form method="post" action="/user/accreditation/ajout" class="m-3">
            @csrf
            <hr class="m-3">
            <h5>Ajouter une nouvelle accréditation</h5>

            <div class="row p-2">
                <!--Nom-->
                <div class="form-group p-2 ">
                    <h6 for="nom">Nom:</h6>
                    <input type="text" class="form-control" name="nom" placeholder="Nom" required>
                </div>
                <div class="form-group col-md-3 p-2">
                    <h6 for="souche">Niveau d'accréditation souche</h6>
                    <input class="form-control" name="souche" placeholder="1" required>
                </div>
            </div>
            <!--Droits-->
            <div class="form-group p-2">
                <h6 for="">Liste des droits:</h6>
                <div class="row">
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <select name="accreditation/0" class="custom-select-sm mr-2">
                                <option value="000">-</option>
                                <option value="001">r</option>
                                <option value="011">ra</option>
                                <option value="111">raw</option>
                            </select>
                            <label class="form-check-label" for="accreditation/0">Identification</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation/1" class="custom-select-sm mr-2">
                                <option value="000">-</option>
                                <option value="001">r</option>
                                <option value="011">ra</option>
                                <option value="111">raw</option>
                            </select>
                            <label class="form-check-label" for="accreditation/1">Synthése EPS</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation/2" class="custom-select-sm mr-2">
                                <option value="000">-</option>
                                <option value="001">r</option>
                                <option value="011">ra</option>
                                <option value="111">raw</option>
                            </select>
                            <label class="form-check-label" for="accreditation/2">Synthése PHA</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation/3" class="custom-select-sm mr-2">
                                <option value="000">-</option>
                                <option value="001">r</option>
                                <option value="011">ra</option>
                                <option value="111">raw</option>
                            </select>
                            <label class="form-check-label" for="accreditation/3">Synthése Autre</label>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-check">
                            <select name="accreditation/4" class="custom-select-sm mr-2">
                                <option value="000">-</option>
                                <option value="001">r</option>
                                <option value="011">ra</option>
                                <option value="111">raw</option>
                            </select>
                            <label class="form-check-label" for="accreditation/4">Pasteur</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation/5" class="custom-select-sm mr-2">
                                <option value="000">-</option>
                                <option value="001">r</option>
                                <option value="011">ra</option>
                                <option value="111">raw</option>
                            </select>
                            <label class="form-check-label" for="accreditation/5">Brevet</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation/6" class="custom-select-sm mr-2">
                                <option value="000">-</option>
                                <option value="001">r</option>
                                <option value="011">ra</option>
                                <option value="111">raw</option>
                            </select>
                            <label class="form-check-label" for="accreditation/6">Exclusivité</label>
                        </div>
                        <div class="form-check">
                            <select name="accreditation/7" class="custom-select-sm mr-2">
                                <option value="000">-</option>
                                <option value="001">r</option>
                                <option value="011">ra</option>
                                <option value="111">raw</option>
                            </select>
                            <label class="form-check-label" for="accreditation/7">Publication</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
        </form>




    </div>
@endsection

@section('customJs')
    <script type="text/javascript" src="{{ URL::asset('js/user.js') }}"></script>
@endsection