<div class="tab-pane fade p-3" id="pills-eps" role="tabpanel" aria-labelledby="pills-eps-tab">

    @if($user->eps > 0)
    <div>
        <div class="custom-control custom-checkbox text-sm-right mt-2">
            <input type="checkbox" class="custom-control-input editMode" id="editModeEps">
            <label class="custom-control-label" for="editModeEps">Mode Edition</label>
            <i class="fas fa-pen"></i>
            <small class="form-text text-muted editZone">N'oubliez pas d'enregistrer les modifications</small>
        </div>
        <button class="btn float-right m-2 btn-warning editZone annulBtn" id="">Annuler les modifications</button>
        <button class="btn float-right m-2 btn-success editZone updateBtn" id="">Valider les modifications</button><br>
    </div>
    <br>
    @endif

    <!--Projet-->
    <div class="p-3 d-block" id="ProjetEps">
        <ul class="list-inline">
            <li class="list-inline-item"><h6 class="font-italic">Projet associé :</h6></li>
            @foreach($souche['projet_souche'] as $projet)
                <li class="list-inline-item">
                    <a href="{{asset("/storage/".$projet->texte)}}" class="font-italic"></a>
                    @if($user->eps == 3) <i class="editButton fas fa-times deleteCross ml-2"></i> @endif
                </li>
            @endforeach
            <li class="list-inline-item editZone">
                <input class="form-control w-75 d-inline" type="text" list="dataProjet" name="eps-projet">
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
            @if($carac->type=="EPS")
                <div class="CaracterisationEps p-3 d-block">
                    <h4>Caractérisation</h4>
                    <hr class="w-50" align="left">
                    <h6 class="w-25">Poid moléculaire: <span class="font-weight-light inputDate" id="eps-poid_moleculaire">{{$carac->poids_moleculaire }}</span></h6>

                    <div class="row">
                        <table class="oses table table-bordered bg-white ml-3" style="width: auto">
                            <thead>
                            <tr>
                                <th>Oses Neutre</th>
                                @if($user->eps == 3) <th class="editZone"></th> @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($souche['caracterisation_oses'] as $oses)
                                @if($oses->type == "neutre")
                                    <tr>
                                        <td><span class="tabText" id="oses-neutre-{{$oses->nom}}">{{$oses->nom}}</span></td>
                                        @if($user->eps == 3)
                                        <td>
                                            <i class="editZone fas fa-times" onclick="deleteTabEntry('oses', '{{$oses->nom}}', 'eps')"></i>
                                        </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="editZone">
                                <td>
                                    <input type="text" class="form-control" name="oses-neutre" list="osesNeutre">
                                    <datalist id="osesNeutre">
                                        @foreach($souche['oses'] as $oses)
                                            @if($oses->type == "neutre")
                                                <option>{{$oses->nom}}</option>
                                            @endif
                                        @endforeach
                                    </datalist>
                                </td>
                                @if($user->eps == 3) <td class="editZone"></td> @endif
                            </tr>
                            </tfoot>
                        </table>

                        <table class="oses table table-bordered bg-white ml-3" style="width: auto">
                            <thead>
                            <tr>
                                <th>Oses acide</th>
                                @if($user->eps == 3) <th class="editZone"></th> @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($souche['caracterisation_oses'] as $oses)
                                @if($oses->type == "acide")
                                    <tr>
                                        <td><span class="tabText" id="oses-acide-{{$oses->nom}}">{{$oses->nom}}</span></td>
                                        @if($user->eps == 3)
                                        <td>
                                            <i class="editZone fas fa-times" onclick="deleteTabEntry('oses', '{{$oses->nom}}', 'eps')"></i>
                                        </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="editZone">
                                <td>
                                    <input type="text" class="form-control" name="oses-neutre" list="osesAcide">
                                    <datalist id="osesAcide">
                                        @foreach($souche['oses'] as $oses)
                                            @if($oses->type == "acide")
                                                <option>{{$oses->nom}}</option>
                                            @endif
                                        @endforeach
                                    </datalist>
                                </td>
                                @if($user->eps == 3) <td class="editZone"></td> @endif
                            </tr>
                            </tfoot>
                        </table>

                        <table class="oses table table-bordered bg-white ml-3" style="width: auto">
                            <thead>
                            <tr>
                                <th>Osamines</th>
                                @if($user->eps == 3) <th class="editZone"></th> @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($souche['caracterisation_oses'] as $oses)
                                @if($oses->type == "amine")
                                    <tr>
                                        <td><span class="tabText" id="oses-amine-{{$oses->nom}}">{{$oses->nom}}</span></td>
                                        @if($user->eps == 3)
                                        <td>
                                            <i class="editZone fas fa-times" onclick="deleteTabEntry('oses', '{{$oses->nom}}', 'eps')"></i>
                                        </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="editZone">
                                <td>
                                    <input type="text" class="form-control" name="oses-neutre" list="osesAmine">
                                    <datalist id="osesAmine">
                                        @foreach($souche['oses'] as $oses)
                                            @if($oses->type == "amine")
                                                <option>{{$oses->nom}}</option>
                                            @endif
                                        @endforeach
                                    </datalist>
                                </td>
                                @if($user->eps == 3) <td class="editZone"></td> @endif
                            </tr>
                            </tfoot>
                        </table>
                        <ul class="col-auto ml-3 list-unstyled">
                            @foreach($souche['fichier_caracterisation'] as $carac)
                                @if($carac->type=="EPS")
                                    <li><a href="{{asset("/storage/".$carac->fichier)}}" class="font-italic mr-1 tabFile">{{$carac->nom}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @if($user->eps > 1)
                    <div class="editZone mt-2">
                        <h6>Ajout fichier de caractérisation:</h6>
                        <input type="text" list="dataCaracterisation" class="form-control w-25" name="eps-fichier_caracterisation-type">
                        <datalist id="dataCaracterisation">
                            <option>Ratio monosaccharidiques</option>
                            <option>RMN</option>
                            <option>Spectre RMN</option>
                            <option>Substituants</option>
                            <option>Spectre HPLC</option>
                            <option>Spectre HPSec</option>
                            @foreach($souche['fichier_caracterisation'] as $carac)
                                @if($carac->type=="EPS")<option>{{$carac->nom}}</option> @endif
                            @endforeach
                        </datalist>
                        <label class="btn btn-light m-2">
                            Ajouter un fichier <input type="file" name="eps-fichier_caracterisation-fichier" hidden>
                        </label>
                    </div>
                    @endif
                </div>
            @endif
        @endforeach

        <!-- Objecti -->
            <div class="ObjectivationEps p-3 d-block">
                <h4>Objectivation</h4>
                <hr class="w-50" align="left">

                <table class="tabEps table table-bordered bg-white ml-3 mr-3" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Protocole</th>
                        <th>Resultat</th>
                        @if($user->eps == 3) <th class="editZone"></th> @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($souche['objectivation'] as $objectivation)
                        @if($objectivation->type=="EPS")
                            <tr>
                                <td><span class="tabText" id="eps-objectivation-{{$loop->iteration}}-nom">{{$objectivation->nom}}</span></td>
                                <td>
                                    @if($objectivation->protocole != "")
                                        <a class="tabFile font-italic mr-2" id="eps-objectivation-{{$loop->iteration}}-protocole" href="{{asset("/storage/".$objectivation->protocole)}}">{{$objectivation->protocole}}</a>
                                    @else
                                        <span class="tabNull" id="eps-objectivation-{{$loop->iteration}}-protocole"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($objectivation->resultat != "")
                                        <a class="tabFile font-italic mr-2" id="eps-objectivation-{{$loop->iteration}}-resultat" href="{{asset("/storage/".$objectivation->resultat)}}">{{$objectivation->protocole}}</a>
                                    @else
                                        <span class="tabNull" id="eps-objectivation-{{$loop->iteration}}-resultat"></span>
                                    @endif
                                </td>
                                @if($user->eps == 3)
                                <td>
                                    <i class="editZone fas fa-times" onclick="deleteTabEntry('objectivation', '{{$objectivation->nom}}', 'eps')"></i>
                                </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="editZone">
                        <td>
                            <input type="text" class="form-control" name="eps-objectivation-0-nom">
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="eps-objectivation-0-fichier" hidden>
                            </label>
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="eps-objectivation-0-fichier" hidden>
                            </label>
                        </td>
                        @if($user->eps == 3) <td class="editZone"></td> @endif
                    </tr>
                    </tfoot>
                </table>
            </div>


        <!-- Production -->

            <div class="ProductionInduEps p-3 d-block">
                <h4>Projet industriel</h4>
                <hr class="w-50" align="left">

                <table class="tabEps table table-bordered bg-white ml-3 mr-3" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Production</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Protocole</th>
                        <th>Résultat</th>
                        @if($user->eps == 3) <th class="editZone"></th> @endif
                    </tr>
                    </thead>
                    <tbody>
                    @isset($souche['production'])
                    @foreach($souche['production'] as $prod)
                        @if($prod->type=="EPS")
                            <tr>
                                <td><span class="tabText">{{$prod->nom}}</span></td>
                                <td><span class="tabDate">{{$prod->date}}</span></td>
                                <td><span class="tabText">{{$prod->lieu}}</span></td>
                                <td>
                                    @if($prod->protocole != "")
                                        <a class="tabFile font-italic mr-2" id="eps-production-{{$loop->iteration}}-protocole" href="{{asset("/storage/".$prod->protocole)}}">{{$prod->protocole}}</a>
                                    @else
                                        <span class="tabNull" id="eps-production-{{$loop->iteration}}-protocole"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($prod->rapport != "")
                                        <a class="tabFile font-italic mr-2" id="eps-production-{{$loop->iteration}}-resultat" href="{{asset("/storage/".$prod->rapport)}}">{{$prod->rapport}}</a>
                                    @else
                                        <span class="tabNull" id="eps-production-{{$loop->iteration}}-resultat"></span>
                                    @endif
                                </td>
                                @if($user->eps == 3)
                                <td>
                                    <i class="editZone fas fa-times" onclick="deleteTabEntry('production', '{{$prod->nom}}', 'eps')"></i>
                                </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    @endisset
                    </tbody>
                    <tfoot>
                    <tr class="editZone">
                        <td>
                            <input type="text" class="form-control" name="eps-production-0-nom">
                        </td>
                        <td>
                            <input type="date" class="form-control" name="eps-production-0-date">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="eps-production-0-lieu">
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="eps-production-0-protocole" hidden>
                            </label>
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="eps-production-0-resultat" hidden>
                            </label>
                        </td>
                        @if($user->eps == 3) <td class="editZone"></td> @endif
                    </tr>
                    </tfoot>
                </table>
            </div>


        <!-- Criblage -->

            <div class="CriblageEps p-3 d-block">
                <h4>Criblage</h4>
                <hr class="w-50" align="left">
                <table class="tabEps table table-bordered bg-white ml-3 mr-3" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Condition</th>
                        <th>Rapport</th>
                        @if($user->eps == 3) <th class="editZone"></th> @endif
                    </tr>
                    </thead>
                    <tbody>
                    @isset($souche['criblage'])
                    @foreach($souche['criblage'] as $criblage)
                        @if($criblage->type=="EPS")
                            <tr>
                                <td><span class="tabText">{{$criblage->nom}}</span></td>
                                <td>
                                    @if($criblage->conditions != "")
                                        <a class="tabFile font-italic mr-2" id="eps-criblage-{{$loop->iteration}}-condition" href="{{asset("/storage/".$criblage->conditions)}}">{{$criblage->conditions}}</a>
                                    @else
                                        <span class="tabNull" id="eps-criblage-{{$loop->iteration}}-condition"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($criblage->rapport != "")
                                        <a class="tabFile font-italic mr-2" id="eps-criblage-{{$loop->iteration}}-rapport" href="{{asset("/storage/".$criblage->rapport)}}">{{$criblage->rapport}}</a>
                                    @else
                                        <span class="tabNull" id="eps-criblage-{{$loop->iteration}}-rapport"></span>
                                    @endif
                                </td>
                                @if($user->eps == 3)
                                <td>
                                    <i class="editZone fas fa-times" onclick="deleteTabEntry('criblage', '{{$criblage->nom}}', 'eps')"></i>
                                </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    @endisset
                    </tbody>
                    <tfoot>
                    <tr class="editZone">
                        <td>
                            <input type="text" class="form-control" name="eps-criblage-0-nom">
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="eps-criblage-0-condition" hidden>
                            </label>
                        </td>
                        <td>
                            <label class="btn btn-light m-2">
                                Ajouter un fichier <input type="file" name="eps-criblage-0-rapport " hidden>
                            </label>
                        </td>
                        @if($user->eps == 3) <td class="editZone"></td> @endif
                    </tr>
                    </tfoot>
                </table>
            </div>

    </div>
</div>