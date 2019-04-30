<div class="tab-pane fade p-3" id="pills-identification" role="tabpanel" aria-labelledby="pills-identification-tab">
    <table id="identification" class="table table-bordered bg-white" style="width:100%">
        <thead>
            <tr>
                <th>Type</th>
                <th>Sequence</th>
                <th>Arbre Phylogénétique</th>
            </tr>
        </thead>
        <tbody>
        @foreach($souche['identification'] as $id)
            <tr>
                <td><span class="tabText" id="identification/{{$loop->iteration}}/type">{{$id->type}}</span></td>
                <td>
                @if($id->sequence != "")
                    <a class="tabFile font-italic mr-2" id="identification/{{$loop->iteration}}/sequence" href="{{asset("/storage/".$id->sequence)}}">{{$id->sequence}}</a>
                @else
                    <span class="tabNull" id="identification/{{$loop->iteration}}/sequence"></span>
                @endif
                </td>
                <td>
                @if($id->arbre != "")
                    <a class="tabFile font-italic mr-2" id="identification/{{$loop->iteration}}/arbre" href="{{asset("/storage/".$id->arbre)}}">{{$id->arbre}}</a>
                @else
                    <span class="tabNull" id="identification/{{$loop->iteration}}/arbre"></span>
                @endif
                </td>
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
                        Ajouter un fichier <input type="file" name="identification/0/arbre" hidden>
                    </label>
                </td>
                <td>
                    <label class="btn btn-light">
                        Ajouter un fichier <input type="file" name="identification/0/arbre" hidden>
                    </label>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
