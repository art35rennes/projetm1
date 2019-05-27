<div class="tab-pane fade p-3" id="pills-publication" role="tabpanel" aria-labelledby="pills-publication-tab">

    @if($user->publication > 1)
    <div>
        <div class="custom-control custom-checkbox text-sm-right mt-2">
            <input type="checkbox" class="custom-control-input editMode" id="editModePublication">
            <label class="custom-control-label" for="editModePublication">Mode Edition</label>
            <i class="fas fa-pen"></i>
            <small class="form-text text-muted editZone">N'oubliez pas d'enregistrer les modifications</small>
        </div>
        <button class="btn float-right m-2 btn-warning editZone annulBtn" id="">Annuler les modifications</button>
        <button class="btn float-right m-2 btn-success editZone updateBtn" id="">Valider les modifications</button><br>
    </div>
    <br>
    @endif

    <table id="publication" class="table table-bordered bg-white" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>Nom</th>
                <th>Publication</th>
                @if($user->projet == 3) <th class="editZone"></th> @endif
            </tr>
        </thead>
        <tbody>
        @foreach($souche['publication'] as $p)
            <tr>
                <td>
                    <span class="tabDate" id="publication/{{$loop->iteration}}/date">{{$p->date}}</span>
                </td>
                <td>
                    <span class="tabText">{{$p->nom}}</span>
                    <input type="hidden" value="isKey">
                </td>
                <td>
                    @if($p->fichier != "")
                        <a class="tabFile font-italic mr-2" id="publication/{{$loop->iteration}}/fichier" href="{{asset("/storage/".$p->fichier)}}">{{$p->nom}}</a>
                    @else
                        <span class="tabNull" id="publication/{{$loop->iteration}}/fichier"></span>
                    @endif
                </td>
                @if($user->projet == 3)
                <td class="editZone">
                    <i class="editZone fas fa-times" onclick="deleteTabEntry('publication', '{{$p->nom}}')"></i>
                </td>
                @endif
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr class="editZone">
            <td>
                <input type="date" class="form-control" name="publication/0/date">
            </td>
            <td>
                <input type="text" class="form-control" name="publication/0/nom">
                <input type="hidden" value="isKey">
            </td>
            <td>
                <label class="btn btn-light">
                    Ajouter un fichier <input type="file" name="publication/0/fichier" hidden>
                </label>
            </td>
            @if($user->projet == 3) <td class="editZone"></td> @endif
        </tr>
        </tfoot>
    </table>
</div>