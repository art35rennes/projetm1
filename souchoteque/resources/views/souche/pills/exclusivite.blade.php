<div class="tab-pane fade" id="pills-exclisivite" role="tabpanel" aria-labelledby="pills-exclisivite-tab">
    <table id="exclisivite" class="table table-bordered bg-white" style="width:100%">
        <thead>
        <tr>
            <th class="d-none">id</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Partenaire</th>
            <th>Secteur</th>
        </tr>
        </thead>
        <tbody>
        @foreach($souche['exclusivite'] as $exclu)
            <tr>
                <td class="d-none"><span id="exclusivite/{{$loop->iteration}}/id">{{$exclu->id}}</span></td>
                <td><span class="tabDate" id="exclusivite/{{$loop->iteration}}/date_debut">{{$exclu->date_debut}}</span></td>
                <td><span class="tabDate" id="exclusivite/{{$loop->iteration}}/date_fin">{{$exclu->date_fin}}</span></td>
                <td><span class="tabText" id="exclusivite/{{$loop->iteration}}/partenaire" list="dataPart">{{$exclu->partenaire}}</span></td>
                <td><span class="tabText" id="exclusivite/{{$loop->iteration}}/activite" list="dataSecteur">{{$exclu->activite}}</span></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr class="editZone">
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
        </tr>
        </tfoot>
    </table>
</div>