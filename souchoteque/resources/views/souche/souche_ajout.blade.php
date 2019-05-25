@extends('layout')
@section('body')
    <br>
    <div class="container bg-light pb-3">
        <h4 class="display-4">Ajout d'une souche</h4>
        <form class="row" method="post" action="/souche/ajout" enctype="multipart/form-data">

            {{ csrf_field() }}
            <div class="col-7">

                <!--Reference souche-->
                <div class="form-group m-1">
                    <h6 class="mt-2" for="ref">Référence de la souche</h6>
                    <input class="form-control" placeholder="Référence" type="text" name="ref" id="ref" autocomplete="off" required/>
                    <div id="refFeedback" class="invalid-feedback">
                        Cette souche existe déjà
                    </div>
                </div>

                <!--Accreditation-->
                <div class="form-group m-1">
                    <h6 for="exampleFormControlSelect1">Niveau d'accréditation requis</h6>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

                <!--Stock souche-->
                <div class="form-group m-1">
                    <h6 class="custom-label mt-2" for="annee_creation">Stock</h6>
                    <input type="number" class="form-control" name="stock" id="stock" value="0" required/>
                </div>

                <!--Description souche-->
                <h6>Description</h6>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="description" id="description"/>
                        <label for="description" class="custom-file-label">Ajouter un fichier</label>
                    </div>
                </div>

                <h6>OGM</h6>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="isOGM" id="isOGM">
                    <label class="custom-control-label" for="isOGM">La souche est OGM ?</label>
                </div>
                <br>
                <div class="form-group" id="OGM">
                    <div class="form-group">
                        <h7 class="custom-label" for="annee_creation">Année de la création</h7>
                        <input type="number" name="annee_creation" placeholder="YYYY" pattern="^^[0-9]{4}$" class="form-control" id="annee_creation"/>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="texte_hcb" id="texte_hcb">
                            <label for="texte_hcb" class="custom-file-label">Texte HCB</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="validation_hcb" id="validation_hcb">
                            <label for="validation_hcb" class="custom-file-label">Validation HCB</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="schema_plasmique" id="schema_plasmique">
                            <label for="schema_plasmique" class="custom-file-label">Schema plasmique</label>
                        </div>
                    </div>
                </div>

                <div class="form-group" id="notOGM">
                    <div class="form-group">
                        <h6 for="origine">Origine de la collecte</h6>
                        <input type="text" class="form-control" name="origine" id="origine"/>
                    </div>
                    <div class="form-group">
                        <h6 class="custom-label" for="annee_creation">Année de la collecte</h6>
                        <input type="number" class="form-control" placeholder="YYYY" pattern="^^[0-9]{4}$" name="annee_collecte" id="annee_collecte"/>
                    </div>
                </div>
                <input type="submit" value="Ajouter" id="ajout" class="btn btn-primary">
            </div>

        </form>
    </div>

@endsection
@section('customJs')
    <script>
        refs = [
            @foreach($souches as $souche)
                "{{$souche->ref}}",
            @endforeach()
        ];
        $("#ref").keyup(function () {
            if (refs.indexOf($("#ref").val()) != -1 && $('#ref').val() != "") {
                $("#ref").addClass("is-invalid");
                $("#ajout").attr('disabled', 'disabled');
            } else {
                $("#ref").removeClass("is-invalid");
                $("#ajout").removeAttr('disabled')
            }
        });

        var isOGM = $("#isOGM");
        var divOGM = $("#OGM");
        var divNotOGM = $("#notOGM");

        divOGM.hide();

        isOGM.change(function () {
            if (isOGM.is(':checked')) {
                divOGM.show();
                divNotOGM.hide();
            } else {
                divOGM.hide();
                divNotOGM.show();
            }
        });
    </script>
@endsection

