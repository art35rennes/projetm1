@extends('layout')
@section('customCss')

@endsection

@section('body')
    <div class="container bg-light">
        <h4 class="display-4 mb-3">Gestion des accréditations</h4>
        <table class="table">
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
                <th>Edition</th>
                <th>Insertion</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-danger font-weight-bold">Administrateur</td>
                <td><input type="checkbox" checked disabled></td>
                <td><input type="checkbox" checked disabled></td>
                <td><input type="checkbox" checked disabled></td>
                <td><input type="checkbox" checked disabled></td>
                <td><input type="checkbox" checked disabled></td>
                <td><input type="checkbox" checked disabled></td>
                <td><input type="checkbox" checked disabled></td>
                <td><input type="checkbox" checked disabled></td>
                <td><input type="checkbox" checked disabled></td>
                <td><input type="checkbox" checked disabled></td>
                <td><i class="fas fa-pen"></i></td>
            </tr>
            </tbody>
        </table>

        <from class="m-3">
            <hr class="m-3">
            <h5>Ajouter une nouvelle accréditation</h5>

            <div class="row p-2">
                <!--Nom-->
                <div class="form-group p-2 ">
                    <h6 for="inputEmail4">Nom:</h6>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Nom">
                </div>

                <div class="form-group col-md-3 p-2">
                    <h6 for="exampleFormControlSelect1">Niveau d'accréditation souche</h6>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <!--Droits-->
            <div class="form-group p-2">
                <h6 for="">Liste des droits:</h6>
                <div class="row">
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Identification</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Synthése EPS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Synthése PHA</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Synthése Autre</label>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Pasteur</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Brevet</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Exclusivité</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Publication</label>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Droit d'édition</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Droit d'insertion</label>
                        </div>
                    </div>
                </div>
            </div>


        </from>



    </div>
@endsection

@section('customJs')

@endsection