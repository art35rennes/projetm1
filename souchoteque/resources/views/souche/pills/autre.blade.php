<div class="tab-pane fade" id="pills-autre" role="tabpanel" aria-labelledby="pills-autre-tab">

    @if($user->autre > 0)
        <div>
            <div class="custom-control custom-checkbox text-sm-right mt-2">
                <input type="checkbox" class="custom-control-input editMode" id="editModeAutre">
                <label class="custom-control-label" for="editModeAutre">Mode Edition</label>
                <i class="fas fa-pen"></i>
                <small class="form-text text-muted editZone">N'oubliez pas d'enregistrer les modifications</small>
            </div>
            <button class="btn float-right m-2 btn-warning editZone annulBtn" id="">Annuler les modifications</button>
            <button class="btn float-right m-2 btn-success editZone updateBtn" id="">Valider les modifications</button><br>
        </div>
        <br>
@endif

    <!--Projet-->
    <div class="p-3 d-block" id="ProjetAutre">
        <ul class="list-inline">
            <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
            @foreach($souche['projet_souche'] as $projet)
                <li class="list-inline-item">
                    <a href="{{asset("/storage/".$projet->texte)}}" class="font-italic">{{$projet->nom}}</a>
                    @if($user->autre == 3) <!--i class="editButton fas fa-times deleteCross ml-2"></i--> @endif
                </li>
            @endforeach
            <li class="list-inline-item editZone">
                <input class="form-control w-75 d-inline" type="text" list="dataProjet" name="autre-projet">
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
            @if($carac->type=="AUTRE")
                <div class="CaracterisationAutre p-3 d-block">
                    <h4>Caractérisation</h4>
                    <hr class="w-50" align="left">
                    <h6>Poid moléculaire: <span class="font-weight-light inputDate" id="autre-poid_moleculaire">{{$carac->poids_moleculaire }}</span></h6>

                    <div class="row">
                        <ul class="col-auto ml-3 list-unstyled">
                            @foreach($souche['fichier_caracterisation'] as $carac)
                                @if($carac->type=="AUTRE")
                                    <li><a href="{{asset("/storage/".$carac->fichier)}}" class="font-italic mr-1 tabFile">{{$carac->nom}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="editZone mt-2 col-auto">
                            <h6>Ajout fichier de caractérisation:</h6>
                            <input type="text" list="dataCaracterisation" class="form-control" name="autre-fichier_caracterisation-type">
                            <datalist id="dataCaracterisation">
                                <option>Ratio monosaccharidiques</option>
                                <option>RMN</option>
                                <option>Spectre RMN</option>
                                <option>Substituants</option>
                                <option>Spectre HPLC</option>
                                <option>Spectre HPSec</option>
                                @foreach($souche['fichier_caracterisation'] as $carac)
                                    @if($carac->type=="AUTRE")<option>{{$carac->nom}}</option> @endif
                                @endforeach
                            </datalist>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="autre-fichier_caracterisation-fichier" hidden>
                            </label>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    <!-- Objecti -->
        @isset($souche['objectivation'])
            <div class="ObjectivationAutre p-3 d-block">
                <h4>Objectivation</h4>
                <hr class="w-50" align="left">

                <table class="tabAutre table table-bordered bg-white ml-3 mr-3" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Protocole</th>
                        <th>Resultat</th>
                        @if($user->autre == 3)
                        <th class="editZone"></th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($souche['objectivation'] as $objectivation)
                        @if($objectivation->type=="AUTRE")
                            <tr>
                                <td>
                                    <span class="tabText" id="autre-objectivation-{{$loop->iteration}}-nom">{{$objectivation->nom}}</span>
                                    <input type="hidden" value="isKey">
                                </td>
                                <td>
                                    @if($objectivation->protocole != "")
                                        <a class="tabFile font-italic mr-2" id="autre-objectivation-{{$loop->iteration}}-protocole" href="{{asset("/storage/".$objectivation->protocole)}}">{{$objectivation->protocole}}</a>
                                    @else
                                        <span class="tabNull" id="autre-objectivation-{{$loop->iteration}}-protocole"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($objectivation->resultat != "")
                                        <a class="tabFile font-italic mr-2" id="autre-objectivation-{{$loop->iteration}}-resultat" href="{{asset("/storage/".$objectivation->resultat)}}">{{$objectivation->protocole}}</a>
                                    @else
                                        <span class="tabNull" id="autre-objectivation-{{$loop->iteration}}-resultat"></span>
                                    @endif
                                </td>
                                @if($user->autre == 3)
                                <td>
                                    <i class="editZone fas fa-times" onclick="deleteTabEntry('objectivation', '{{$objectivation->nom}}', 'autre')"></i>
                                </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="editZone">
                        <td>
                            <input type="text" class="form-control" name="autre-objectivation-0-nom">
                            <input type="hidden" value="isKey">
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="autre-objectivation-0-fichier" hidden>
                            </label>
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="autre-objectivation-0-fichier" hidden>
                            </label>
                        </td>
                        @if($user->autre == 3)
                        <td class="editZone"></td>
                        @endif
                    </tr>
                    </tfoot>
                </table>
            </div>
        @endisset

    <!-- Production -->
        @isset($souche['production'])
            <div class="ProductionInduAutre p-3 d-block">
                <h4>Projet industriel</h4>
                <hr class="w-50" align="left">

                <table class="tabAutre table table-bordered bg-white ml-3 mr-3" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Production</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Protocole</th>
                        <th>Résultat</th>
                        @if($user->autre == 3)
                        <th class="editZone"></th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($souche['production'] as $prod)
                        @if($prod->type=="AUTRE")
                            <tr>
                                <td>
                                    <span class="tabText">{{$prod->nom}}</span>
                                    <input type="hidden" value="isKey">
                                </td>
                                <td><span class="tabDate">{{$prod->date}}</span></td>
                                <td><span class="tabText">{{$prod->lieu}}</span></td>
                                <td>
                                    @if($prod->protocole != "")
                                        <a class="tabFile font-italic mr-2" id="autre-production-{{$loop->iteration}}-protocole" href="{{asset("/storage/".$prod->protocole)}}">{{$prod->protocole}}</a>
                                    @else
                                        <span class="tabNull" id="autre-production-{{$loop->iteration}}-protocole"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($prod->rapport != "")
                                        <a class="tabFile font-italic mr-2" id="autre-production-{{$loop->iteration}}-resultat" href="{{asset("/storage/".$prod->rapport)}}">{{$prod->rapport}}</a>
                                    @else
                                        <span class="tabNull" id="autre-production-{{$loop->iteration}}-resultat"></span>
                                    @endif
                                </td>
                                @if($user->autre == 3)
                                <td>
                                    <i class="editZone fas fa-times" onclick="deleteTabEntry('production', '{{$prod->nom}}', 'autre')"></i>
                                </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="editZone">
                        <td>
                            <input type="text" class="form-control" name="autre-production-0-nom">
                            <input type="hidden" value="isKey">
                        </td>
                        <td>
                            <input type="date" class="form-control" name="autre-production-0-date">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="autre-production-0-lieu">
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="autre-production-0-protocole" hidden>
                            </label>
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="autre-production-0-resultat" hidden>
                            </label>
                        </td>
                        @if($user->autre == 3)
                        <td class="editZone"></td>
                        @endif
                    </tr>
                    </tfoot>
                </table>
            </div>
        @endisset

    <!-- Criblage -->
        @isset($souche['production'])
            <div class="CriblageAutre p-3 d-block">
                <h4>Criblage</h4>
                <hr class="w-50" align="left">
                <table class="tabAutre table table-bordered bg-white ml-3 mr-3" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Condition</th>
                        <th>Rapport</th>
                        @if($user->autre == 3)
                        <th class="editZone"></th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($souche['criblage'] as $criblage)
                        @if($criblage->type=="AUTRE")
                            <tr>
                                <td>
                                    <span class="tabText">{{$criblage->nom}}</span>
                                    <input type="hidden" value="isKey">
                                </td>
                                <td>
                                    @if($criblage->conditions != "")
                                        <a class="tabFile font-italic mr-2" id="autre-criblage-{{$loop->iteration}}-condition" href="{{asset("/storage/".$criblage->conditions)}}">{{$criblage->conditions}}</a>
                                    @else
                                        <span class="tabNull" id="autre-criblage-{{$loop->iteration}}-condition"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($criblage->rapport != "")
                                        <a class="tabFile font-italic mr-2" id="autre-criblage-{{$loop->iteration}}-rapport" href="{{asset("/storage/".$criblage->rapport)}}">{{$criblage->rapport}}</a>
                                    @else
                                        <span class="tabNull" id="autre-criblage-{{$loop->iteration}}-rapport"></span>
                                    @endif
                                </td>
                                @if($user->autre == 3)
                                <td>
                                    <i class="editZone fas fa-times" onclick="deleteTabEntry('criblage', '{{$criblage->nom}}', 'autre')"></i>
                                </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="editZone">
                        <td>
                            <input type="text" class="form-control" name="autre-criblage-0-nom">
                            <input type="hidden" value="isKey">
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="autre-criblage-0-condition" hidden>
                            </label>
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="autre-criblage-0-rapport " hidden>
                            </label>
                        </td>
                        @if($user->autre == 3)
                        <td class="editZone"></td>
                        @endif
                    </tr>
                    </tfoot>
                </table>
            </div>
        @endisset
    </div>
</div>