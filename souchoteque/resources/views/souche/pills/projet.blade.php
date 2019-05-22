<div class="tab-pane fade" id="pills-projet" role="tabpanel" aria-labelledby="pills-projet-tab">
    <table id="projet" class="table table-bordered bg-white" style="width:100%">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Date</th>
            <th>Partenaire</th>
            <th>Secteur</th>
            <th>Document</th>
            <th class="editZone"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($souche['projet_souche'] as $projet)
            <tr>
                <td><span class="tabText" id="projet/{{$loop->iteration}}/nom">{{$projet->nom}}</span></td>
                <td><span class="tabDate" id="projet/{{$loop->iteration}}/date">{{$projet->date}}</span></td>
                <td><span class="tabText" id="projet/{{$loop->iteration}}/partenaire">{{$projet->partenaire}}</span></td>
                <td><span class="tabText" id="projet/{{$loop->iteration}}/activite">{{$projet->activite}}</span></td>
                <td>
                    @if($projet->texte != "")
                        <a class="tabFile font-italic mr-2" id="projet/{{$loop->iteration}}/texte" href="{{asset("/storage/".$projet->texte)}}">{{$projet->texte}}</a>
                    @else
                        <span class="tabNull" id="projet/{{$loop->iteration}}/text"></span>
                    @endif
                </td>
                <td class="editZone">
                    <i class="editZone fas fa-times" onclick="deleteTabEntry('projet', '{{$projet->nom}}')"></i>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr class="editZone">
            <td>
                <input type="date" class="form-control" name="projet/0/nom">
            </td>
            <td>
                <input type="date" class="form-control" name="projet/0/date">
            </td>
            <td>
                <input class="form-control" type="text" list="dataPart" name="projet/0/partenaire">
                <datalist id="dataPart">
                    @foreach($souche['partenaire'] as $part)
                        <option>{{$part->nom}}<option>
                    @endforeach
                </datalist>
            </td>
            <td>
                <input class="form-control" type="text" class="input-group" list="dataSecteur" name="projet/0/activite">
                <datalist id="dataSecteur">
                    @foreach($souche['activite'] as $act)
                        <option>{{$act->nom}}<option>
                    @endforeach
                </datalist>
            </td>
            <td>
                <label class="btn btn-light">
                    Ajouter un fichier <input type="file" name="projet/0/texte" hidden>
                </label>
            </td>
            <td class="editZone"></td>
        </tr>
        </tfoot>
    </table>
</div>