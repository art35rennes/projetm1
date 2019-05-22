<div class="tab-pane fade" id="pills-pha" role="tabpanel" aria-labelledby="pills-pha-tab">
    <!--Projet-->
    <div class="p-3 d-block" id="ProjetPha">
        <ul class="list-inline">
            <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
            @foreach($souche['projet_souche'] as $projet)
                <li class="list-inline-item">
                    <a href="{{asset("/storage/".$projet->texte)}}" class="font-italic"></a>
                    <i class="editButton fas fa-times deleteCross ml-2"></i>
                </li>
            @endforeach
            <li class="list-inline-item editZone">
                <input class="form-control w-75 d-inline" type="text" list="dataProjet" name="pha-projet">
                <datalist id="dataProjet">
                    @foreach($souche['projet'] as $projet)
                        <option>{{$projet->nom}}</option>
                    @endforeach
                </datalist>
            </li>
        </ul>
        <hr class="w-50" align="left">
    </div>

    <div>
        <!-- Carac -->
        @foreach($souche['caracterisation'] as $carac)
            @if($carac->type=="PHA")
                <div class="CaracterisationPha p-3 d-block">
                    <h4>Caractérisation</h4>
                    <hr class="w-50" align="left">
                    <h6>Poid moléculaire: <span class="font-weight-light inputDate" id="pha-poid_moleculaire">{{$carac->poids_moleculaire }}</span></h6>

                    <div class="row">
                        <ul class="col-auto ml-3 list-unstyled">
                            @foreach($souche['fichier_caracterisation'] as $carac)
                                @if($carac->type=="PHA")
                                    <li><a href="{{asset("/storage/".$carac->fichier)}}" class="font-italic mr-1 tabFile">{{$carac->nom}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="editZone mt-2 col-auto">
                            <h6>Ajout fichier de caractérisation:</h6>
                            <input type="text" list="dataCaracterisation" class="form-control" name="pha-fichier_caracterisation-type">
                            <datalist id="dataCaracterisation">
                                <option>Ratio monosaccharidiques</option>
                                <option>RMN</option>
                                <option>Spectre RMN</option>
                                <option>Substituants</option>
                                <option>Spectre HPLC</option>
                                <option>Spectre HPSec</option>
                                @foreach($souche['fichier_caracterisation'] as $carac)
                                    @if($carac->type=="PHA")<option>{{$carac->nom}}</option> @endif
                                @endforeach
                            </datalist>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="pha-fichier_caracterisation-fichier" hidden>
                            </label>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    <!-- Objecti -->
        @isset($souche['objectivation'])
            <div class="ObjectivationPha p-3 d-block">
                <h4>Objectivation</h4>
                <hr class="w-50" align="left">

                <table class="tabPha table table-bordered bg-white ml-3 mr-3" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Protocole</th>
                        <th>Resultat</th>
                        <th class="editZone"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($souche['objectivation'] as $objectivation)
                        @if($objectivation->type=="PHA")
                            <tr>
                                <td><span class="tabText" id="pha-objectivation-{{$loop->iteration}}-nom">{{$objectivation->nom}}</span></td>
                                <td>
                                    @if($objectivation->protocole != "")
                                        <a class="tabFile font-italic mr-2" id="pha-objectivation-{{$loop->iteration}}-protocole" href="{{asset("/storage/".$objectivation->protocole)}}">{{$objectivation->protocole}}</a>
                                    @else
                                        <span class="tabNull" id="pha-objectivation-{{$loop->iteration}}-protocole"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($objectivation->resultat != "")
                                        <a class="tabFile font-italic mr-2" id="pha-objectivation-{{$loop->iteration}}-resultat" href="{{asset("/storage/".$objectivation->resultat)}}">{{$objectivation->protocole}}</a>
                                    @else
                                        <span class="tabNull" id="pha-objectivation-{{$loop->iteration}}-resultat"></span>
                                    @endif
                                </td>
                                <td class="editZone">
                                    <i class="editZone fas fa-times" onclick="deleteTabEntry('objectivation', '{{$objectivation->nom}}', 'pha')"></i>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="editZone">
                        <td>
                            <input type="text" class="form-control" name="pha-objectivation-0-nom">
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="pha-objectivation-0-fichier" hidden>
                            </label>
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="pha-objectivation-0-fichier" hidden>
                            </label>
                        </td>
                        <td class="editZone"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        @endisset

    <!-- Production -->
        @isset($souche['production'])
            <div class="ProductionInduPha p-3 d-block">
                <h4>Projet industriel</h4>
                <hr class="w-50" align="left">

                <table class="tabPha table table-bordered bg-white ml-3 mr-3" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Production</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Protocole</th>
                        <th>Résultat</th>
                        <th class="editZone"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($souche['production'] as $prod)
                        @if($prod->type=="PHA")
                            <tr>
                                <td><span class="tabText">{{$prod->nom}}</span></td>
                                <td><span class="tabDate">{{$prod->date}}</span></td>
                                <td><span class="tabText">{{$prod->lieu}}</span></td>
                                <td>
                                    @if($prod->protocole != "")
                                        <a class="tabFile font-italic mr-2" id="pha-production-{{$loop->iteration}}-protocole" href="{{asset("/storage/".$prod->protocole)}}">{{$prod->protocole}}</a>
                                    @else
                                        <span class="tabNull" id="pha-production-{{$loop->iteration}}-protocole"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($prod->rapport != "")
                                        <a class="tabFile font-italic mr-2" id="pha-production-{{$loop->iteration}}-resultat" href="{{asset("/storage/".$prod->rapport)}}">{{$prod->rapport}}</a>
                                    @else
                                        <span class="tabNull" id="pha-production-{{$loop->iteration}}-resultat"></span>
                                    @endif
                                </td>
                                <td class="editZone">
                                    <i class="editZone fas fa-times" onclick="deleteTabEntry('production', '{{$prod->nom}}', 'pha')"></i>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="editZone">
                        <td>
                            <input type="text" class="form-control" name="pha-production-0-nom">
                        </td>
                        <td>
                            <input type="date" class="form-control" name="pha-production-0-date">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="pha-production-0-lieu">
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="pha-production-0-protocole" hidden>
                            </label>
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="pha-production-0-resultat" hidden>
                            </label>
                        </td>
                        <th class="editZone"></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        @endisset

    <!-- Criblage -->
        @isset($souche['production'])
            <div class="CriblagePha p-3 d-block">
                <h4>Criblage</h4>
                <hr class="w-50" align="left">
                <table class="tabPha table table-bordered bg-white ml-3 mr-3" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Condition</th>
                        <th>Rapport</th>
                        <th class="editZone"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($souche['criblage'] as $criblage)
                        @if($criblage->type=="PHA")
                            <tr>
                                <td><span class="tabText">{{$criblage->nom}}</span></td>
                                <td>
                                    @if($criblage->conditions != "")
                                        <a class="tabFile font-italic mr-2" id="pha-criblage-{{$loop->iteration}}-condition" href="{{asset("/storage/".$criblage->conditions)}}">{{$criblage->conditions}}</a>
                                    @else
                                        <span class="tabNull" id="pha-criblage-{{$loop->iteration}}-condition"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($criblage->rapport != "")
                                        <a class="tabFile font-italic mr-2" id="pha-criblage-{{$loop->iteration}}-rapport" href="{{asset("/storage/".$criblage->rapport)}}">{{$criblage->rapport}}</a>
                                    @else
                                        <span class="tabNull" id="pha-criblage-{{$loop->iteration}}-rapport"></span>
                                    @endif
                                </td>
                                <td class="editZone">
                                    <i class="editZone fas fa-times" onclick="deleteTabEntry('criblage', '{{$criblage->nom}}', 'pha')"></i>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="editZone">
                        <td>
                            <input type="text" class="form-control" name="pha-criblage-0-nom">
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="pha-criblage-0-condition" hidden>
                            </label>
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="pha-criblage-0-rapport " hidden>
                            </label>
                        </td>
                        <td class="editZone"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        @endisset
    </div>
</div>