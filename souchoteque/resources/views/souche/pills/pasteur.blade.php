<div class="tab-pane fade p-3" id="pills-pasteur" role="tabpanel" aria-labelledby="pills-pasteur-tab">
    <table id="pasteur" class="table table-bordered bg-white" style="width:100%">
        <thead>
            <tr>
                <th>Date de dépot</th>
                <th>Titre</th>
                <th>Numéro</th>
                <th>Stock</th>
                <th>Dossier Pasteur</th>
                <th>Validation Pasteur</th>
                <th>Photo</th>
                <th class="editZone"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($souche['pasteur'] as $p)
            <tr>
                <td>
                    <span class="tabDate" id="pasteur/{{$loop->iteration}}/date_depot">{{$p->date_depot}}</span>
                </td>
                <td>
                    <span class="tabText" id="pasteur/{{$loop->iteration}}/titre">{{$p->titre}}</span>
                </td>
                <td>
                    <span class="tabNum" id="pasteur/{{$loop->iteration}}/numero">{{$p->numero}}</span>
                </td>
                <td>
                    <span class="tabNum" id="pasteur/{{$loop->iteration}}/stock">{{$p->stock}}</span>
                </td>
                <td>
                    @if($p->dossier_depot != "")
                    <a class="font-italic tabFile mr-2" id="pasteur/{{$loop->iteration}}/dossier_depot" href="{{asset("/storage/".$p->dossier_depot)}}">dépot</a>
                    @else
                    <span class="tabNull" id="pasteur/{{$loop->iteration}}/dossier_depot"></span>
                    @endif
                </td>
                <td>
                    @if($p->scan_validation != "")
                    <a class="font-italic tabFile mr-2" id="pasteur/{{$loop->iteration}}/scan_validation" href="{{asset("/storage/".$p->scan_validation)}}">validation</a>
                    @else
                    <span class="tabNull" id="pasteur/{{$loop->iteration}}/scan_validation"></span>
                    @endif
                </td>

                <td>
                    @if($p->photo_cryotube != "")
                    <a class="tabFile mr-2" id="pasteur/{{$loop->iteration}}/photo_cryotube" data-toggle="tooltip" title="<img src='{{asset("/storage/".$p->photo_cryotube)}}'>">
                        Photo Cryotube
                    </a>
                    @else
                    <span class="tabNull" id="pasteur/{{$loop->iteration}}/photo_cryotube"></span>
                    @endif
                </td>
                <td class="editZone">
                    <i class="editZone fas fa-times" onclick="deleteTabEntry('pasteur', '{{$p->titre}}')"></i>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr class="editZone">
                <td>
                    <input class="form-control" type="date" name="pasteur/0/date_depot">
                </td>
                <td>
                    <input class="form-control" type="text" name="pasteur/0/titre">
                </td>
                <td>
                    <input class="form-control" type="number" name="pasteur/0/numero">
                </td>
                <td>
                    <input class="form-control" type="number" name="pasteur/0/stock">
                </td>
                <td>
                    <label class="btn btn-light">
                        Ajouter un fichier <input type="file" name="pasteur/0/dossier_depot" hidden>
                    </label>
                </td>
                <td>
                    <label class="btn btn-light">
                        Ajouter un fichier <input type="file" name="pasteur/0/scan_validation" hidden>
                    </label>
                </td>
                <td>
                    <label class="btn btn-light">
                        Ajouter un fichier <input type="file" name="pasteur/0/photo_cryotube" hidden>
                    </label>
                </td>
                <td class="editZone"></td>
            </tr>
        </tfoot>
    </table>
</div>