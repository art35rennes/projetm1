<!doctype html>
<html lang="fr">
	<head>
		<?php
        include "ressource/html/ressource.html"
		?>
	</head>

    <body>
		<?php
        include "ressource/html/navbar.html"
		?>
		
		<br>
        
        <div class="container">
           <form id="addForm" class="pagination-container" >
           		<h4 class="display-4">Ajout d'une souche</h4>
               	
               	<!-- Collection et description -->
                <div data-page="1" id="page1">
                	<br>
                	<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Nouvelle souche<span class="font-weight-bold text-danger"> *</span> :</h6>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="radioOui">oui&nbsp;</label>
								<input class="form-check-input" type="radio" name="nvSouche" id="radioOui" value="1" required>
								<label class="form-check-label" for="radioNon">non&nbsp;</label>
								<input class="form-check-input" type="radio" name="nvSouche" id="radioNon" value="0">
							</div>
						</div>
						<div class="input-group col-sm-6" id="divNon">
							<label for="registerNum" class="col-sm-7 col-form-label">Ancien numéro d'enregistrement&nbsp;:</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="registerNum" name="registerNum" placeholder="..." pattern="^(eps|pha|EPS|PHA)(\w|-)*$">
							</div>
						</div>
            			<div class="input-group col-sm-6" id="divOui">
							<label class="col-sm-6 col-form-label">Type&nbsp;:</label>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="radioPha">PHA&nbsp;</label>
								<input class="form-check-input" type="radio" name="radioType" id="radioPha" value="1">
								<label class="form-check-label" for="radioEps">EPS&nbsp;</label>
								<input class="form-check-input" type="radio" name="radioType" id="radioEps" value="0">
							</div>
						</div>
             		</section>
                   
                    <h4>Collection bactérienne</h4>
                    <br>
                    <!-- Collection !-->
                    <section>
						<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Origine de la collection<span class="font-weight-bold text-danger"> *</span> :</h6>
							<div class="col-sm-5">
									<input name="collectionDesc" type="text" required="required" class="form-control" id="collectionDesc" placeholder="...">
							</div>
						</div>
               		</section>

               		<h4>Description de la souche</h4>
                    <br>
                    <!-- Macroscopique !-->
                    <section>
						<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Observation macroscopique :</h6>
							<div class="col-sm-5">
								<textarea name="macroDesc" class="form-control" placeholder="..."></textarea>
							</div>
						</div>
						<div class="input-group col-sm-6">
						<div class="input-group-prepend">
							<span class="input-group-text">PNG ou JPEG</span>
						</div>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="macroFile" name="macroFile">
							<label class="custom-file-label" for="macroFile">Selectionner un fichier</label>
						</div>
					</div>
              		</section>
               		
               		<br>
               		<!-- Microscopique !-->
               		<section>
						<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Observation microscopique :</h6>
							<div class="col-sm-5">
								<textarea name="microDesc" class="form-control" placeholder="..."></textarea>
							</div>
						</div>
						<div class="input-group col-sm-6">
							<div class="input-group-prepend">
								<span class="input-group-text">PNG ou JPEG</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="microFile">
								<label class="custom-file-label" for="microFile">Selectionner un fichier</label>
							</div>
						</div>
              		</section>
               		
               		<br>
               		<!-- API !-->
               		<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Galerie API :</h6>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="boxApi">Effectué&nbsp;</label>
								<input class="form-check-input" type="checkbox" name="boxApi" id="boxApi" value="1">
							</div>
						</div>
						<div class="input-group col-sm-6" id="divApi">
							<div class="p-3 mb-2 bg-warning text-dark font-weight-bold font-italic"><br><p>Type d'info ?</p><br></div>
						</div>
             		</section>
              		
              		<br>
               		<!-- Biolog !-->
               		<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Galerie Biolog :</h6>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="boxBiolog">Effectué&nbsp;</label>
								<input class="form-check-input" type="checkbox" name="boxBiolog" id="boxBiolog" value="1">
							</div>
						</div>
						<div class="input-group col-sm-6" id="divBiolog">
							<div class="p-3 mb-2 bg-warning text-dark font-weight-bold font-italic"><br><p>Type d'info ?</p><br></div>
						</div>
             		</section>
               		
               		<br>
               		<!-- Embl !-->
               		<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Etude Embl :</h6>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="boxEmbl">Effectué&nbsp;</label>
								<input class="form-check-input" type="checkbox" name="Embl" id="boxEmbl" value="1">
							</div>
						</div>
						<div class="input-group col-sm-6" id="divEmbl">
							<label for="emblRef" class="col-sm-6 col-form-label">Référence :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="emblRef" placeholder="...">
							</div>
						</div>
             		</section>
              		
               		<br>
               		<!-- ARN 16S !-->
               		<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Etude ARN 16S :</h6>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="boxArn">Effectué&nbsp;</label>
								<input class="form-check-input" type="checkbox" name="boxArn" id="boxArn" value="1">
							</div>
						</div>
						<div class="input-group col-sm-6" id="divArn">
							<div class="input-group-prepend">
								<span class="input-group-text">Word</span>
							</div>
							<div class="custom-file">
								<input type="text" class="custom-file-input" id="arn16sFile" name="arn16sFile">
								<label class="custom-file-label" for="arn16sFile">Selectionner un fichier</label>
							</div>
						</div>
             		</section>
             		
             		<br>
               		<!-- Blast !-->
               		<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Etude BLAST :</h6>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="boxBlast">Effectué&nbsp;</label>
								<input class="form-check-input" type="checkbox" name="boxBlast" id="boxBlast" >
							</div>
						</div>
						<div class="input-group col-sm-6" id="divBlast">
							<div class="input-group-prepend">
								<span class="input-group-text">Word</span>
							</div>
							<div class="custom-file">
								<input type="text" class="custom-file-input" id="blastFile" name="blastFile">
								<label class="custom-file-label" for="blastFile">Selectionner un fichier</label>
							</div>
						</div>
             		</section>
             		
             		<br>
             		<!-- Arbre !-->
               		<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Arbre phylogénétique :</h6>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="boxArbre">Effectué&nbsp;</label>
								<input class="form-check-input" type="checkbox" name="boxArbre" id="boxArbre" value="1">
							</div>
						</div>
						<div class="input-group col-sm-6" id="divArbre">
							<div class="p-3 mb-2 bg-warning text-dark font-weight-bold font-italic"><br><p>Type d'info ?</p><br></div>
						</div>
             		</section>
             		
              		<br>
               		<!-- Pasteur !-->
               		<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Enregistrement institut Pasteur :</h6>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="boxPasteur">Effectué&nbsp;</label>
								<input class="form-check-input" type="checkbox" name="boxPasteur" id="boxPasteur" >
							</div>
						</div>
						<div class="input-group col-sm-6" id="divPasteur">
							<label for="pasteurNum" class="col-sm-6 col-form-label">Numéro d'enregistrement&nbsp;:</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="pasteurNum" name="pasteurNum" placeholder="...">
							</div>
						</div>
             		</section>
               
                </div>
                
                <!-- Culture -->
                <div data-page="2" id="page2" style="display:none;">
                    <br>
					<h4>Culture des bactéries</h4>
                    <br>
                    <!-- Température !-->
                    <section>
						<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Température de culture :</h6>
							<div class="col-sm-5">
									<input name="temperature" type="numeric" class="form-control" id="temperature" placeholder="...">
							</div>
						</div>
               		</section>
               		
               		<br>
                    <!-- pH !-->
                    <section>
						<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">pH de culture :</h6>
							<div class="col-sm-5">
									<input name="pH" type="numeric" class="form-control" id="pH" placeholder="...">
							</div>
						</div>
               		</section>
               		
               		<br>
                    <!-- Salinité !-->
                    <section>
						<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Température de culture :</h6>
							<div class="col-sm-5">
									<input name="salinite" type="numeric" class="form-control" id="salinite" placeholder="...">
							</div>
						</div>
               		</section>
               		
               		<br>
                    <!-- Oxygénation !-->
                    <section>
						<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Oxygénation :</h6>
							<div class="col-sm-5">
									<input name="oxy" type="numeric" class="form-control" id="oxy" placeholder="...">
							</div>
						</div>
               		</section>
               		
               		<br>
               		<!-- Optimisation !-->
               		<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Optimisation des conditions de croissance :</h6>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="boxOpti">Effectué&nbsp;</label>
								<input class="form-check-input" type="checkbox" name="boxOpti" id="boxOpti" >
							</div>
						</div>
						<div class="input-group col-sm-6" id="divOpti">
							<div class="input-group-prepend">
								<span class="input-group-text">CSV</span>
							</div>
							<div class="custom-file">
								<input type="text" class="custom-file-input" id="optiFile" name="optiFile">
								<label class="custom-file-label" for="optiFile">Selectionner un fichier</label>
							</div>
						</div>
             		</section>
                </div>
                
                <!-- EPS || SHA -->
                <div data-page="3" id="page3" style="display:none;">
                    <br>
					<!-- EPS !-->
                    <div id="criblageEps" class="">
                    	<h4>Criblage EPS</h4>
                    	
                    	<br>
                    	<!-- Condition !-->
                    	<section>
							<div class="form-group row">
								<h6 class="col-sm-3 col-form-label">Condition :</h6>
								<div class="col-sm-5">
										<input name="condition" type="text" class="form-control" id="conditionEps" placeholder="...">
								</div>
							</div>
						</section>
                   		
                   		<br>
                    	<!-- Resultat !-->
                    	<section>
							<div class="form-group row">
								<h6 class="col-sm-3 col-form-label">Resultat :</h6>
								<div class="col-sm-5">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="productionEps" id="production0Eps" value="0">
										<label class="form-check-label" for="production0Eps">Pas productrice</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="productionEps" id="production1Eps" value="1">
										<label class="form-check-label" for="production1Eps">Peu productrice</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="productionEps" id="production2Eps" value="2">
										<label class="form-check-label" for="production2Eps">Moyennement productrice</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="productionEps" id="production3Eps" value="3">
										<label class="form-check-label" for="production3Eps">Trés productrice</label>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="form-check form-check-inline col-sm-5">
									<label class="form-check-label" for="boxImgEps">Joindre une image&nbsp;</label>
									<input class="form-check-input" type="checkbox" name="boxImgEps" id="boxImgEps" value="1">
								</div>
							</div>
							<div class="input-group col-sm-6" id="divImgEps">
								<div class="input-group-prepend">
									<span class="input-group-text">PNG ou JPEG</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="imgFileEps" name="imgFileEps">
									<label class="custom-file-label" for="imgFileEps">Selectionner un fichier</label>
								</div>
							</div>
							
						</section>
                   
                   		<br>
                    	<!-- Rendement !-->
                    	<section>
							<div class="form-group row">
								<h6 class="col-sm-3 col-form-label">Rendement :</h6>
								<div class="col-sm-5">
										<input name="rendement" type="text" class="form-control" id="rendement" placeholder="...">
								</div>
							</div>
						</section>
                    </div>
                    
                    <!-- PHA !-->
                    <div id="criblagePha" class="">
                    	<h4>Criblage PHA</h4>
                    	
                    	<br>
                    	<!-- Condition !-->
                    	<section>
							<div class="form-group row">
								<h6 class="col-sm-3 col-form-label">Condition :</h6>
								<div class="col-sm-5">
										<input name="condition" type="text" class="form-control" id="conditionPha" placeholder="...">
								</div>
							</div>
						</section>
                   		
                   		<br>
                    	<!-- Resultat !-->
                    	<section>
							<div class="form-group row">
								<h6 class="col-sm-3 col-form-label">Resultat :</h6>
								<div class="col-sm-5">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="productionPha" id="production0Pha" value="0">
										<label class="form-check-label" for="production0Pha">Pas productrice</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="productionPha" id="production1Pha" value="1">
										<label class="form-check-label" for="production1Pha">Peu productrice</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="productionPha" id="production2Pha" value="2">
										<label class="form-check-label" for="production2Pha">Moyennement productrice</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="productionPha" id="production3Pha" value="3">
										<label class="form-check-label" for="production3Pha">Trés productrice</label>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="form-check form-check-inline col-sm-5">
									<label class="form-check-label" for="boxImgPha">Joindre une image&nbsp;</label>
									<input class="form-check-input" type="checkbox" name="boxImgPha" id="boxImgPha" value="1">
								</div>
							</div>
							<div class="input-group col-sm-6" id="divImgPha">
								<div class="input-group-prepend">
									<span class="input-group-text">PNG ou JPEG</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="imgFilePha" name="imgFilePha">
									<label class="custom-file-label" for="imgFilePha">Selectionner un fichier</label>
								</div>
							</div>
							
						</section>
                   
                   		<br>
                    	<!-- Rendement !-->
                    	<section>
							<div class="form-group row">
								<h6 class="col-sm-3 col-form-label">Rendement :</h6>
								<div class="col-sm-5">
										<input name="rendement" type="text" class="form-control" id="rendement" placeholder="...">
								</div>
							</div>
						</section>
                    </div>
                </div>
                
                <!-- Caractérisation -->
                <div data-page="4" id="page4" style="display:none;">
                    <br>
                    <!-- EPS -->
                    <div id="caracterisationEps" class="">
                    	<h4>Caractérisation de l'EPS</h4>
                    	
                    	<br>
                    	<!-- Dosages -->
						<section>
							<h6 class="col-sm-3 col-form-label">Dosages colorimétrique: </h6>
							<table class="table table-bordered text-center">
								<tbody>
									<tr>
										<td rowspan="2" class="align-middle">Isolat</td>
										<td rowspan="2" class="align-middle">Protéines (%)</td>
										<td colspan="3">Composition osidique (%)</td>
									</tr>
									<tr>
										<td>Oses neutres</td>
										<td>Oses acides</td>
										<td>Osamines</td>
									</tr>
									<tr>
										<td><input type="text" class="form-control" placeholder="..." name="isolatEps"></td>
										<td><input type="text" class="form-control" placeholder="..." name="protEps"></td>
										<td>
											<div class="form-row">
												<div class="col">
													<input type="text" class="form-control" placeholder="..." name="osesNEps">
												</div>
												<label>&plusmn;</label>
												<div class="col">
													<input type="text" class="form-control" placeholder="..." name="osesNcEps">
												</div>
											</div>
										</td>
										<td>
											<div class="form-row">
												<div class="col">
													<input type="text" class="form-control" placeholder="..." name="oseAEps">
												</div>
												<label>&plusmn;</label>
												<div class="col">
													<input type="text" class="form-control" placeholder="..." name="osesAcEps">
												</div>
											</div>
										</td>
										<td><input type="text" class="form-control" placeholder="..." name="osesEps"></td>
									</tr>
								</tbody>
							</table>
						</section>
                   
                   		<br>
						<!-- Spectro !-->
						<section>
							<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Spectrométrie infra-rouge :</h6>
								<div class="form-check form-check-inline col-sm-5">
									<label class="form-check-label" for="boxSpectroEps">Effectué&nbsp;</label>
									<input class="form-check-input" type="checkbox" name="boxSpectroEps" id="boxSpectroEps" >
								</div>
							</div>
							<div class="input-group col-sm-6" id="divSpectroEps">
								<div class="input-group-prepend">
									<span class="input-group-text">PNG ou JPEG</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="spectroEpsFile" name="spectroEpsFile">
									<label class="custom-file-label" for="spectroEpsFile">Selectionner un fichier</label>
								</div>
							</div>
						</section>
                                      
                   		<br>
						<!-- Analyse !-->
						<section>
							<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Analyse élémentaire :</h6>
								<div class="form-check form-check-inline col-sm-5">
									<label class="form-check-label" for="boxAnalyseEps">Effectué&nbsp;</label>
									<input class="form-check-input" type="checkbox" name="boxAnalyseEps" id="boxAnalyseEps">
								</div>
							</div>
							<div class="input-group col-sm-6" id="divAnalyseEps">
								<div class="input-group-prepend">
									<span class="input-group-text">Tableau</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="analyseFileEps" name="analyseFileEps">
									<label class="custom-file-label" for="analyseFileEps">Selectionner un fichier</label>
								</div>
							</div>
						</section>
                   
                   		<br>
						<!-- RMN !-->
						<section>
							<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Résonance Magnétique Nucléaire :</h6>
								<div class="form-check form-check-inline col-sm-5">
									<label class="form-check-label" for="boxRmnEps">Effectué&nbsp;</label>
									<input class="form-check-input" type="checkbox" name="boxRmnEps" id="boxRmnEps">
								</div>
							</div>
							<div class="input-group col-sm-6" id="divRmnEps">
								<div class="input-group-prepend">
									<span class="input-group-text">Tableau</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="rmnFileEps" name="rmnFileEps">
									<label class="custom-file-label" for="rmnFileEps">Selectionner un fichier</label>
								</div>
							</div>
						</section>
                   
                   		<br>
						<!-- Dessin !-->
						<section>
							<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Dessin de la structure :</h6>
								<div class="form-check form-check-inline col-sm-5">
									<label class="form-check-label" for="boxIsisEps">Effectué&nbsp;</label>
									<input class="form-check-input" type="checkbox" name="boxIsisEps" id="boxIsisEps">
								</div>
							</div>
							<div class="input-group col-sm-6" id="divIsisEps">
								<div class="input-group-prepend">
									<span class="input-group-text">Image</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="isisFileEps" name="isisFileEps">
									<label class="custom-file-label" for="isisFileEps">Selectionner un fichier</label>
								</div>
							</div>
						</section>
                   		
                   		<br>
						<!-- HPLC !-->
						<section>
							<div class="form-group row">
								<h6 class="col-sm-4 col-form-label">Evaluation de sa masse moléculaire (HPLC) :</h6>
								<div class="form-check form-check-inline col-sm-5">
									<label class="form-check-label" for="boxHplcEps">Effectué&nbsp;</label>
									<input class="form-check-input" type="checkbox" name="boxHplcEps" id="boxHplcEps">
								</div>
							</div>
							<div class="input-group col-sm-6" id="divHplcEps1">
								<div class="input-group-prepend">
									<span class="input-group-text">Spectre</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="spectreHplcEpsFile" name="spectreHplcEpsFile">
									<label class="custom-file-label" for="spectreHplcEpsFile">Selectionner un fichier</label>
								</div>
							</div>
							<br>
							<div class="input-group col-sm-6" id="divHplcEps2">
								<div class="input-group-prepend">
									<span class="input-group-text">Tableau</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="tableHplcEpsFile" name="tableHplcEpsFile">
									<label class="custom-file-label" for="tableHplcEpsFile">Selectionner un fichier</label>
								</div>
							</div>
						</section>
                   		
                   		<br>
						<!-- Osidique !-->
						<section>
							<div class="form-group row">
							<h6 class="col-sm-6 col-form-label">Composition osidique par chromatographie en phase gazeuse :</h6>
								<div class="form-check form-check-inline col-sm-5">
									<label class="form-check-label" for="boxOsidiqueEps">Effectué&nbsp;</label>
									<input class="form-check-input" type="checkbox" name="boxOsidiqueEps" id="boxOsidiqueEps">
								</div>
							</div>
							<div class="input-group col-sm-6" id="divOsidiqueEps1">
								<div class="input-group-prepend">
									<span class="input-group-text">Spectre</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="spectroEpsFile" name="spectroEpsFile">
									<label class="custom-file-label" for="spectroEpsFile">Selectionner un fichier</label>
								</div>
							</div>
							<br>
							<div class="input-group col-sm-6" id="divOsidiqueEps2">
								<div class="input-group-prepend">
									<span class="input-group-text">Tableau</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="osidiqueEpsFile" name="osidiqueEpsFile">
									<label class="custom-file-label" for="osidiqueEpsFile">Selectionner un fichier</label>
								</div>
							</div>
						</section>
                   </div>
                                                            
                    <!-- PHA -->
					<div id="caracterisationPha" class="">
						<br>
						<h4>Caractérisation du PHA</h4>
						<br>
						<!-- RMN !-->
						<section>
							<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Résonance Magnétique Nucléaire :</h6>
								<div class="form-check form-check-inline col-sm-5">
									<label class="form-check-label" for="boxRmnPha">Effectué&nbsp;</label>
									<input class="form-check-input" type="checkbox" name="boxRmnPha" id="boxRmnPha">
								</div>
							</div>
							<div class="input-group col-sm-6" id="divRmnPha">
								<div class="input-group-prepend">
									<span class="input-group-text">Tableau</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="rmnFileEps" name="rmnFilePha">
									<label class="custom-file-label" for="rmnFileEps">Selectionner un fichier</label>
								</div>
							</div>
						</section>
						
						<br>
						<!-- Dessin !-->
						<section>
							<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Dessin de la structure :</h6>
								<div class="form-check form-check-inline col-sm-5">
									<label class="form-check-label" for="boxIsisPha">Effectué&nbsp;</label>
									<input class="form-check-input" type="checkbox" name="boxIsisPha" id="boxIsisPha">
								</div>
							</div>
							<div class="input-group col-sm-6" id="divIsisPha">
								<div class="input-group-prepend">
									<span class="input-group-text">Image</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="isisFileEps" name="isisFilePha">
									<label class="custom-file-label" for="isisFileEps">Selectionner un fichier</label>
								</div>
							</div>
						</section>
					</div>
                </div>
                
                <!-- Hémi synthèse -->
                <div data-page="5" id="page5" style="display:none;">
                    <br>
					<!-- EPS -->
                    <div id="hemiEps" class="">
                    	<h4>Dépolymérisation (DR) </h4>
                    	<br>
                    	<!-- DR !-->
						<section>
							<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Rendement :</h6>
								<div class="col-sm-5">
									<input name="rendementDrEps" type="text" required="required" class="form-control" id="rendementDrEps" placeholder="...">
								</div>
							</div>
							<div class="input-group col-sm-6">
								<div class="input-group-prepend">
									<span class="input-group-text">Mode opératoire</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="rendementDrEpsFile" name="rendementDrEpsFile">
									<label class="custom-file-label" for="rendementDrEpsFile">Selectionner un fichier</label>
								</div>
							</div>
						</section>
                   		
                   		<br>
                   		<div class="p-3 mb-2 bg-warning text-dark font-weight-bold font-italic"><br><p>Intégration page caractérisation ?</p><br></div>
                   		
                   		<br><br>
                   		<h4>Sulfatation</h4>
                   		<br>
                    	<!-- Sulfatation !-->
						<section>
							<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Rendement :</h6>
								<div class="col-sm-5">
									<input name="collectionDesc" type="text" required="required" class="form-control" id="collectionDesc" placeholder="...">
								</div>
							</div>
							<div class="input-group col-sm-6" id="divSpectroEps">
								<div class="input-group-prepend">
									<span class="input-group-text">Mode opératoire</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="spectroEpsFile" name="spectroEpsFile">
									<label class="custom-file-label" for="spectroEpsFile">Selectionner un fichier</label>
								</div>
							</div>
						</section>
						
						<br>
						<div class="p-3 mb-2 bg-warning text-dark font-weight-bold font-italic"><br><p>Intégration page caractérisation ? multiple ?</p><br></div>
                    </div>
                    
                    <!-- PHA -->
                    <div id="hemiPha" class="">
                    	<h4>Fonctionnalisation</h4>
                   		<br>
                    	<!-- Sulfatation !-->
						<section>
							<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Rendement :</h6>
								<div class="col-sm-5">
									<input name="collectionDesc" type="text" required="required" class="form-control" id="collectionDesc" placeholder="...">
								</div>
							</div>
							<div class="input-group col-sm-6" id="divSpectroEps">
								<div class="input-group-prepend">
									<span class="input-group-text">Mode opératoire</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="spectroEpsFile" name="spectroEpsFile">
									<label class="custom-file-label" for="spectroEpsFile">Selectionner un fichier</label>
								</div>
							</div>
						</section>
                   
                   		<br>
                   		<div class="p-3 mb-2 bg-warning text-dark font-weight-bold font-italic"><br><p>Intégration page caractérisation ? Multiple ?</p><br></div>
                    </div>
                </div>
                
                <!-- Activité -->
                <div data-page="6" id="page6" style="display:none;">
                    <br>
					<!-- EPS  -->
                    <div id="actiEps" class="">
                    	<h4>Activité de l'EPS</h4>
                    	
                    	<br>
                    	<!-- Biologique -->
                    	<section>
							<div class="form-group row">
								<h6 class="col-sm-3 col-form-label bg-warning">Activité biologique :</h6>
								<div class="col-sm-5">
										<input name="collectionDesc" type="text" class="form-control" id="collectionDesc" placeholder="...">
								</div>
							</div>
               			</section>
                   
                   		<br>
                    	<!-- Physico -->
                    	<section>
							<div class="form-group row">
								<h6 class="col-sm-3 col-form-label bg-warning">Activité physico-chimique :</h6>
								<div class="col-sm-5">
										<input name="collectionDesc" type="text" class="form-control" id="collectionDesc" placeholder="...">
								</div>
							</div>
               			</section>
                    </div>
                    
                    <!-- PHA -->
                    <div id="actiPha" class="">
                    	<h4>Propriétés du PHA</h4>
                    	
                    	<br>
                    	<!-- Biologique -->
                    	<section>
							<div class="form-group row">
								<h6 class="col-sm-3 col-form-label bg-warning">Propriétés biologique :</h6>
								<div class="col-sm-5">
										<input name="collectionDesc" type="text" class="form-control" id="collectionDesc" placeholder="...">
								</div>
							</div>
               			</section>
                   
                   		<br>
                    	<!-- Physico -->
                    	<section>
							<div class="form-group row">
								<h6 class="col-sm-3 col-form-label bg-warning">Propriétés physico-chimique :</h6>
								<div class="col-sm-5">
										<input name="collectionDesc" type="text" class="form-control" id="collectionDesc" placeholder="...">
								</div>
							</div>
               			</section>
                    </div>
                    
                </div>
                
                <!-- Industrie -->
                <div data-page="7" id="page7" style="display:none;">
                    <br>
					<h4>Exclusivité industriel</h4>
                    <br>
                    <!-- Propriété -->
                	<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Propriété donné à un industriel :</h6>
						<div class="form-check form-check-inline col-sm-5">
						<label class="form-check-label" for="industrielRadioOui">oui&nbsp;</label>
								<input class="form-check-input" type="radio" name="industrielRadio" id="industrielRadioOui" value="1" required>
						<label class="form-check-label" for="industrielRadioNon" checked>non&nbsp;</label>
							<input name="industrielRadio" type="radio" class="form-check-input" id="industrielRadioNon" value="0" checked="checked">
						</div>
						</div>
            			<div id="industrielDivOui">
							<br>
							<!-- Industriel -->
							<section>
								<div class="form-group row">
									<h6 class="col-sm-3 col-form-label">Nom de l'industriel :</h6>
									<div class="col-sm-5">
										<input name="collectionDesc" type="text" class="form-control" id="collectionDesc" placeholder="...">
									</div>
								</div>
							</section>
							
							<br>
							<!-- Domaine -->
							<section>
								<div class="form-group row">
									<h6 class="col-sm-3 col-form-label">Domaine d'application :</h6>
									<div class="col-sm-5">
										<select class="form-control" id="domaineIndustrie">
											<option></option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option value="new">Nouveau domaine</option>
										</select>
									</div>
								</div>
								<div class="form-group row" id="domaineDivIndustrie">
									<label class="col-sm-3 col-form-label">Nouveau domaine :</label>
									<div class="col-sm-5">
										<input name="collectionDesc" type="text" class="form-control" id="collectionDesc" placeholder="...">
									</div>
								</div>
							</section>
							
							<br>
							<!-- Zone -->
							<section>
								<div class="form-group row">
									<h6 class="col-sm-3 col-form-label">Zone géographique :</h6>
									<div class="col-sm-5">
										<select class="form-control" id="domaineIndustrie">
											<option></option>
											<option>Europe</option>
											<option>Asie</option>
											<option>Amérique du Nord</option>
											<option>Amérique du Sud</option>
										</select>
									</div>
								</div>
							</section>
							
							<br>
							<!-- Durée -->
							<section>
								<div class="form-group row">
									<h6 class="col-sm-3 col-form-label">Fin d'éxclusivité :</h6>
									<div class="col-sm-5">
										<input name="collectionDesc" type="date" class="form-control" id="collectionDesc" placeholder="...">
									</div>
								</div>
							</section>
						</div>
             		</section>                    
                	
                	<h4>Propriété industriel</h4>
                	<br>
               		<!-- Pasteur Bis !-->
               		<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Enregistrement institut Pasteur :</h6>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="boxPasteurBis">Effectué&nbsp;</label>
								<input class="form-check-input" type="checkbox" name="boxPasteur" id="boxPasteurBis" >
							</div>
						</div>
						<div class="input-group col-sm-6" id="divPasteurBis">
							<label for="pasteurNum" class="col-sm-6 col-form-label">Numéro d'enregistrement&nbsp;:</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="pasteurNumBis" name="pasteurNumBis" placeholder="...">
							</div>
						</div>
             		</section>
             		
             		<br>
                    <!-- Numéro !-->
                    <section>
						<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Numéro de brevet :</h6>
							<div class="col-sm-5">
									<input name="collectionDesc" type="text" class="form-control" id="collectionDesc" placeholder="...">
							</div>
						</div>
               		</section>
             		
             		<br>
					<!-- Activité -->
					<section>
						<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Activités :</h6>
							<div class="col-sm-5">
								<select class="form-control" id="activiteBrevet">
									<option></option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option value="new">Nouvelle activité</option>
								</select>
							</div>
						</div>
						<div class="form-group row" id="activiteDivBrevet">
							<label class="col-sm-3 col-form-label">Nouvelle activité :</label>
							<div class="col-sm-5">
								<input name="collectionDesc" type="text" class="form-control" id="collectionDesc" placeholder="...">
							</div>
						</div>
					</section>
            		
            		<br>
					<!-- Texte !-->
					<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Texte du brevet :</h6>
							<div class="input-group col-sm-6">
								<div class="input-group-prepend">
									<span class="input-group-text">Word ou PDF</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="texteBrevet" name="texteBrevet">
									<label class="custom-file-label" for="texteBrevet">Selectionner un fichier</label>
								</div>
							</div>
						</div>
					</section>
            		
            		<br>
					<!-- Domaine !-->
					<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Domaine d'application :</h6>
							<div class="input-group col-sm-6">
								<div class="input-group-prepend">
									<span class="input-group-text">INPI</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="domaineBrevet" name="domaineBrevet">
									<label class="custom-file-label" for="domaineBrevet">Selectionner un fichier</label>
								</div>
							</div>
						</div>
					</section>
             		
             		<h4>Enveloppes soleau</h4>
                	<br>
                    <!-- Numéro !-->
                    <section>
						<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Date de dépot :</h6>
							<div class="col-sm-5">
									<input name="collectionDesc" type="date" class="form-control" id="collectionDesc" placeholder="...">
							</div>
						</div>
               		</section>
             		
             		<br>
					<!-- Activité -->
					<section>
						<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Activités :</h6>
							<div class="col-sm-5">
								<select class="form-control" id="activiteLettre">
									<option></option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option value="new">Nouvelle activité</option>
								</select>
							</div>
						</div>
						<div class="form-group row" id="activiteDivLettre">
							<label class="col-sm-3 col-form-label">Nouvelle activité :</label>
							<div class="col-sm-5">
								<input name="collectionDesc" type="text" class="form-control" id="collectionDesc" placeholder="...">
							</div>
						</div>
					</section>
            		
            		<br>
					<!-- Texte !-->
					<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Texte du brevet :</h6>
							<div class="input-group col-sm-6">
								<div class="input-group-prepend">
									<span class="input-group-text">Word ou PDF</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="texteBrevet" name="texteBrevet">
									<label class="custom-file-label" for="texteBrevet">Selectionner un fichier</label>
								</div>
							</div>
						</div>
					</section>
            		
            		<br>
					<!-- Domaine !-->
					<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Domaine d'application :</h6>
							<div class="input-group col-sm-6">
								<div class="input-group-prepend">
									<span class="input-group-text">INPI</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="domaineBrevet" name="domaineBrevet">
									<label class="custom-file-label" for="domaineBrevet">Selectionner un fichier</label>
								</div>
							</div>
						</div>
					</section>
                </div>
                
                <!-- Publication -->
                <div data-page="8" id="page8" style="display:none;">
                    <br>
					<h4>Publication relative</h4>
                    <br>
					<!-- Publication !-->
					<section>
						<div class="form-group row">
						<h6 class="col-sm-3 col-form-label">Publication(s) :</h6>
							<div class="input-group col-sm-6">
								<div class="input-group-prepend">
									<span class="input-group-text">Word ou PDF</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="domaineBrevet" name="domaineBrevet">
									<label class="custom-file-label" for="domaineBrevet">Selectionner un fichier</label>
								</div>
							</div>
						</div>
					</section>
                </div>
                                
                <br><br>
                
                <div class="justify-content-end">
                    <button class="btn btn-info" type="submit">Ajouter à la base</button>
                </div>
                
                <br>

                <div class="pagination pagination-centered justify-content-center">
                    <ul class="pagination ">
                        <li class="page-item" id="previous" data-page="-"><a class="page-link bg-dark text-white" href="#addForm" >Pr&eacute;c&eacute;dent</a></li>
                        <li class="page-item active" id="bPage1" data-page="1"><a class="page-link" href="#addForm" >Description</a></li>
                        <li class="page-item" id="bPage2" data-page="2"><a class="page-link" href="#addForm" >Culture</a></li>
                        <li class="page-item" id="bPage3" data-page="3"><a class="page-link" href="#addForm" id="aPage3">Type</a></li>
                        <li class="page-item" id="bPage4" data-page="4"><a class="page-link" href="#addForm" >Caractérisation</a></li>
                        <li class="page-item" id="bPage5" data-page="5"><a class="page-link" href="#addForm" >Hémi&nbsp;Synthése</a></li>
                        <li class="page-item" id="bPage6" data-page="6"><a class="page-link" href="#addForm" >Activité</a></li>
                        <li class="page-item" id="bPage7" data-page="7"><a class="page-link" href="#addForm" >Industrie</a></li>
                        <li class="page-item" id="bPage8" data-page="8"><a class="page-link" href="#addForm" >Publication</a></li>
                        <li class="page-item" id="next" data-page="+"><a class="page-link bg-dark text-white" href="#addForm" >Suivant</a></li>
                    </ul>
                </div>
            </form>
        </div>
        
        <?php
        include "ressource/html/script.html"
		?>
        
        <footer>
			<?php
            include "ressource/html/footer.html"
			?>
		</footer>
	</body>
	
	
</html>