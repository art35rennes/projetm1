<div class="tab-pane fade p-3" id="pills-brevet" role="tabpanel" aria-labelledby="pills-brevet-tab">
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
                <th class="editZone"></th>
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
                <td class="editZone">
                    <i class="editZone fas fa-times" onclick="deleteTabEntry('brevet', '{{$brevet->titre}}')"></i>
                </td>
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
                <td class="editZone"></td>
            </tr>
        </tfoot>
    </table>
</div>