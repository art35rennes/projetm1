<div class="tab-pane fade" id="pills-exclisivite" role="tabpanel" aria-labelledby="pills-exclisivite-tab">

    @if($user->exclusivite > 1)
    <div>
        <div class="custom-control custom-checkbox text-sm-right mt-2">
            <input type="checkbox" class="custom-control-input editMode" id="editModeExclusivite">
            <label class="custom-control-label" for="editModeExclusivite">Mode Edition</label>
            <i class="fas fa-pen"></i>
            <small class="form-text text-muted editZone">N'oubliez pas d'enregistrer les modifications</small>
        </div>
        <button class="btn float-right m-2 btn-warning editZone annulBtn" id="">Annuler les modifications</button>
        <button class="btn float-right m-2 btn-success editZone updateBtn" id="">Valider les modifications</button><br>
    </div>
    <br>
    @endif

    <table id="exclisivite" class="table table-bordered bg-white" style="width:100%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Partenaire</th>
            <th>Secteur</th>
            <th class="editZone"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($souche['exclusivite'] as $exclu)
            <tr>
                <td><span class="tabNum"  id="exclusivite/{{$loop->iteration}}/id">{{$exclu->id}}</span></td>
                <td><span class="tabDate" id="exclusivite/{{$loop->iteration}}/date_debut">{{$exclu->date_debut}}</span></td>
                <td><span class="tabDate" id="exclusivite/{{$loop->iteration}}/date_fin">{{$exclu->date_fin}}</span></td>
                <td><span class="tabText" id="exclusivite/{{$loop->iteration}}/partenaire" list="dataPart">{{$exclu->partenaire}}</span></td>
                <td><span class="tabText" id="exclusivite/{{$loop->iteration}}/activite" list="dataSecteur">{{$exclu->activite}}</span></td>
                <td class="editZone">
                    <i class="editZone fas fa-times" onclick="deleteTabEntry('exclusivite', '{{$exclu->id}}')"></i>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr class="editZone">
            <td></td>
            <td>
                <input type="date" class="form-control" name="exclusivite/0/date_debut">
            </td>
            <td>
                <input type="date" class="form-control" name="exclusivite/0/date_fin">
            </td>
            <td>
                <input class="form-control" type="text" list="dataPart" name="exclusivite/0/partenaire">
                <datalist id="dataPart">
                    @foreach($souche['partenaire'] as $part)
                    <option>{{$part->nom}}<option>
                    @endforeach
                </datalist>
            </td>
            <td>
                <input class="form-control" type="text" class="input-group" list="dataSecteur" name="exclusivite/0/activite">
                <datalist id="dataSecteur">
                    @foreach($souche['activite'] as $act)
                    <option>{{$act->nom}}<option>
                    @endforeach
                </datalist>
            </td>
            <td class="editZone"></td>
        </tr>
        </tfoot>
    </table>
</div>