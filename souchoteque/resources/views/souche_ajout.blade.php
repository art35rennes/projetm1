@extends('layout')
@section('body')
    <br>
    <div class="container bg-light pb-3">
        <h4 class="display-4">Ajout d'une souche</h4>
        <form method="post" action="/souche/ajout">
            <div class="form-group" id="refDiv">
                <label for="ref">Référence de la souche</label>
                <input class="form-control is-invalid" placeholder="Référence" type="text" name="ref" id="ref" autocomplete="off" required/>
                <div id="refFeedback" class="invalid-feedback">
                    Cette souche existe déjà
                </div>
                <div class="form-group">
                    <label class="custom-label" for="annee_creation">Stock</label>
                    <input type="number" class="form-control" id="stock" value="0"/>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="description">
                        <label for="description" class="custom-file-label">Description</label>
                    </div>
                </div>
                Description
            </div>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="isOGM">
                <label class="custom-control-label" for="isOGM">OGM ?</label>
            </div>
            <br>
            <div class="form-group" id="OGM">
                <div class="form-group">
                    <label class="custom-label" for="annee_creation">Année de la création</label>
                    <input type="number" class="form-control" id="annee_creation"/>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="texte_hcb">
                        <label for="texte_hcb" class="custom-file-label">Texte HCB</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validation_hcb">
                        <label for="validation_hcb" class="custom-file-label">Validation HCB</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="schema_plasmique">
                        <label for="schema_plasmique" class="custom-file-label">Schema plasmique</label>
                    </div>
                </div>
            </div>
            <div class="form-group" id="notOGM">
                <div class="form-group">
                    <label for="origine">Origine de la collecte</label>
                    <input type="text" class="form-control" id="origine"/>
                </div>
                <div class="form-group">
                    <label class="custom-label" for="annee_creation">Année de la collecte</label>
                    <input type="number" class="form-control" id="annee_collecte"/>
                </div>
            </div>
            <input type="submit" value="Ajouter" id="ajout" disabled="disabled" class="btn btn-primary">

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
            if (refs.indexOf($("#ref").val()) != -1)
            {
                $("#ref").attr("class", "form-control is-invalid");
                $("#ajout").attr('disabled','disabled');
            }else{
                $("#ref").attr("class", "form-control");
                $("#ajout").removeAttr('disabled')
            }
        });

        var isOGM = $("#isOGM");
        var divOGM = $("#OGM");
        var divNotOGM = $("#notOGM");

        divOGM.hide();

        isOGM.change(function() {
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

