<div class="tab-pane fade p-3" id="pills-publication" role="tabpanel" aria-labelledby="pills-publication-tab">
    <table id="publication" class="table table-bordered bg-white" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>Publication</th>
            </tr>
        </thead>
        <tbody>
        @foreach($souche['publication'] as $p)
            <tr>
                <td class="tabDate">{{$p->date}}</td>
                <td>
                    @if($p->fichier != "")
                        <a class="tabFile font-italic mr-2" id="publication/{{$loop->iteration}}/fichier" href="{{asset("/storage/".$p->fichier)}}">{{$p->fichier}}</a>
                    @else
                        <span class="tabNull" id="publication/{{$loop->iteration}}/fichier"></span>
                    @endif
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
                <label class="btn btn-light">
                    Ajouter un fichier <input type="file" name="publication/0/fichier" hidden>
                </label>
            </td>
        </tr>
        </tfoot>
    </table>
</div>