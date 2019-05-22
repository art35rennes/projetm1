<div class="tab-pane fade p-3" id="pills-publication" role="tabpanel" aria-labelledby="pills-publication-tab">
    <table id="publication" class="table table-bordered bg-white" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>Nom</th>
                <th>Publication</th>
                <th class="editZone"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($souche['publication'] as $p)
            <tr>
                <td>
                    <span class="tabDate" id="publication/{{$loop->iteration}}/date">{{$p->date}}</span>
                </td>
                <td>
                    @if($p->fichier != "")
                        <span class="tabText">{{$p->nom}}</span>
                    @endif
                </td>
                <td>
                    @if($p->fichier != "")
                        <a class="tabFile font-italic mr-2" id="publication/{{$loop->iteration}}/fichier" href="{{asset("/storage/".$p->fichier)}}">{{$p->nom}}</a>
                    @else
                        <span class="tabNull" id="publication/{{$loop->iteration}}/fichier"></span>
                    @endif
                </td>
                <td class="editZone">
                    <i class="editZone fas fa-times" onclick="deleteTabEntry('publication', '{{$p->nom}}')"></i>
                </td>
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
            </td>
            <td>
                <label class="btn btn-light">
                    Ajouter un fichier <input type="file" name="publication/0/fichier" hidden>
                </label>
            </td>
            <td class="editZone"></td>
        </tr>
        </tfoot>
    </table>
</div>