<div class="tab-pane fade p-3" id="pills-identification" role="tabpanel" aria-labelledby="pills-identification-tab">

    @if($user->identification > 0)
    <div>
        <div class="custom-control custom-checkbox text-sm-right mt-2">
            <input type="checkbox" class="custom-control-input editMode" id="editModeIdentification">
            <label class="custom-control-label" for="editModeIdentification">Mode Edition</label>
            <i class="fas fa-pen"></i>
            <small class="form-text text-muted editZone">N'oubliez pas d'enregistrer les modifications</small>
        </div>
        <button class="btn float-right m-2 btn-warning editZone annulBtn" id="">Annuler les modifications</button>
        <button class="btn float-right m-2 btn-success editZone updateBtn" id="">Valider les modifications</button><br>
    </div>
    <br>
    @endif

    <table id="identification" class="table table-bordered bg-white" style="width:100%">
        <thead>
            <tr>
                <th>Type</th>
                <th>Sequence</th>
                <th>Arbre Phylogénétique</th>
                @if($user->identification == 3) <th class="editZone"></th> @endif
            </tr>
        </thead>
        <tbody>
        @foreach($souche['identification'] as $id)
            <tr>
                <td><span class="tabText" id="identification-{{$loop->iteration}}-type">{{$id->type}}</span></td>
                <td>
                @if($id->sequence != "")
                    <a class="tabFile font-italic mr-2" id="identification-{{$loop->iteration}}-sequence" href="{{asset("/storage/".$id->sequence)}}">{{$id->sequence}}</a>
                @else
                    <span class="tabNull" id="identification-{{$loop->iteration}}-sequence"></span>
                @endif
                </td>
                <td>
                @if($id->arbre != "")
                    <a class="tabFile font-italic mr-2" id="identification-{{$loop->iteration}}-arbre" href="{{asset("/storage/".$id->arbre)}}">{{$id->arbre}}</a>
                @else
                    <span class="tabNull" id="identification-{{$loop->iteration}}-arbre"></span>
                @endif
                </td>
                @if($user->identification == 3)
                <td class="editZone">
                    <i class="editZone fas fa-times" onclick="deleteTabEntry('identification', '{{$id->type}}')"></i>
                </td>
                @endif
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr class="editZone">
                <td>
                    <input type="text" class="form-control" list="dataIdentification" placeholder="Type..." name="identification/0/type" isKey="true">
                    <datalist id="dataIdentification">
                        @foreach($souche['identification'] as $id)
                            <option>{{$id->type}}</option>
                        @endforeach
                    </datalist>
                </td>
                <td>
                    <label class="btn btn-light">
                        Ajouter un fichier <input type="file" name="identification/0/sequence" hidden>
                    </label>
                </td>
                <td>
                    <label class="btn btn-light">
                        Ajouter un fichier <input type="file" name="identification/0/arbre" hidden>
                    </label>
                </td>
                @if($user->identification == 3) <td class="editZone"></td> @endif
            </tr>
        </tfoot>
    </table>
</div>
