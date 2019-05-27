<div class="tab-pane fade p-3" id="pills-brevet" role="tabpanel" aria-labelledby="pills-brevet-tab">

    @if($user->brevet > 1)
        <div>
            <div class="custom-control custom-checkbox text-sm-right mt-2">
                <input type="checkbox" class="custom-control-input editMode" id="editModeBrevet">
                <label class="custom-control-label" for="editModeBrevet">Mode Edition</label>
                <i class="fas fa-pen"></i>
                <small class="form-text text-muted editZone">N'oubliez pas d'enregistrer les modifications</small>
            </div>
            <button class="btn float-right m-2 btn-warning editZone annulBtn" id="">Annuler les modifications</button>
            <button class="btn float-right m-2 btn-success editZone updateBtn" id="">Valider les modifications</button><br>
        </div>
        <br>
    @endif

    <table id="brevet" class="table table-bordered bg-white" style="width:100%">
        <thead>
            <tr>
                <th>Numero</th>
                <th>Titre</th>
                <th>Type</th>
                <th>Demande</th>
                <th>Secteur</th>
                <th>Texte</th>
                <th>INPI</th>
                @if($user->autre == 3)
                <th class="editZone"></th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach($souche['brevet_soleau'] as $brevet)
            <tr>
                <td>
                    <span class="tabNum" id="brevet_soleau/{{$loop->iteration}}/numero">{{$brevet->numero}}</span>
                </td>
                <td>
                    <span class="tabText" id="brevet_soleau/{{$loop->iteration}}/titre">{{$brevet->titre}}</span>
                    <input type="hidden" value="isKey">
                </td>
                <td>
                    <span>@if($brevet->inpi==null) Brevet @else Soleau @endif</span>
                </td>
                <td>
                    <span class="tabDate" id="brevet_soleau/{{$loop->iteration}}/date">{{$brevet->date}}</span>
                </td>
                <td>
                    <span class="tabText" id="brevet_soleau/{{$loop->iteration}}/activite">{{$brevet->activite}}</span>
                </td>
                <td>
                    @if($brevet->scan!="")
                        <a class="font-italic tabFile mr-2" id="brevet_soleau/{{$loop->iteration}}/scan" href="{{asset("/storage/".$brevet->scan)}}">{{$brevet->scan}}</a>
                    @else
                        <span class="tabNull" id="brevet_soleau/{{$loop->iteration}}/scan"></span>
                    @endif
                </td>
                <td>
                    @if($brevet->inpi!="")
                        <a class="font-italic tabFile mr-2" id="brevet_soleau/{{$loop->iteration}}/inpi" href="{{asset("/storage/".$brevet->inpi)}}">{{$brevet->inpi}}</a>
                    @else
                        <span class="tabNull" id="brevet_soleau/{{$loop->iteration}}/inpi"></span>
                    @endif
                </td>
                @if($user->autre == 3)
                <td class="editZone">
                    <i class="editZone fas fa-times" onclick="deleteTabEntry('brevet', '{{$brevet->titre}}')"></i>
                </td>
                @endif
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr class="editZone">
                <td>
                    <input class="form-control" type="number" name="brevet_soleau/0/numero">
                </td>
                <td>
                    <input class="form-control" type="text" name="brevet_soleau/0/titre">
                    <input type="hidden" value="isKey">
                </td>
                <td>&nbsp;</td>
                <td>
                    <input class="form-control" type="date" name="brevet_soleau/0/date">
                </td>
                <td>
                    <input class="form-control" type="text" name="brevet_soleau/0/activite">
                </td>
                <td>
                    <label class="btn btn-light">
                        Ajouter un fichier <input type="file" name="brevet_soleau/0/scan" hidden>
                    </label>
                </td>
                <td>
                    <label class="btn btn-light">
                        Ajouter un fichier <input type="file" name="brevet_soleau/0/inpi" hidden>
                    </label>
                </td>
                @if($user->autre == 3)
                <td class="editZone"></td>
                @endif
            </tr>
        </tfoot>
    </table>
</div>