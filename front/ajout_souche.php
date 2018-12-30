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
								<label class="form-check-label" for="radioSha">PHA&nbsp;</label>
								<input class="form-check-input" type="radio" name="radioType" id="radioSha" value="1">
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
							<span class="input-group-text">Ajouter une image</span>
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
								<span class="input-group-text">Ajouter une image</span>
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
								<span class="input-group-text">Ajouter un fichier</span>
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
								<input class="form-check-input" type="checkbox" name="boxBlast" id="boxBlast" value="option1">
							</div>
						</div>
						<div class="input-group col-sm-6" id="divBlast">
							<div class="input-group-prepend">
								<span class="input-group-text">Ajouter un fichier</span>
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
						<h6 class="col-sm-3 col-form-label">Enregistrment institut Pasteur :</h6>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="boxPasteur">Effectué&nbsp;</label>
								<input class="form-check-input" type="checkbox" name="boxPasteur" id="boxPasteur" value="option1">
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
								<input class="form-check-input" type="checkbox" name="boxOpti" id="boxOpti" value="option1">
							</div>
						</div>
						<div class="input-group col-sm-6" id="divOpti">
							<div class="input-group-prepend">
								<span class="input-group-text">Ajouter un fichier</span>
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
                    <div id="criblageEps">
                    	<h4>Criblage :</h4>
                    	
                    	<br>
                    	<!-- Condition !-->
                    	<section>
							<div class="form-group row">
								<h6 class="col-sm-3 col-form-label">Condition :</h6>
								<div class="col-sm-5">
										<input name="condition" type="text" class="form-control" id="condition" placeholder="...">
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
										<input class="form-check-input" type="radio" name="production" id="production0" value="0">
										<label class="form-check-label" for="production0">Pas productrice</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="production" id="production1" value="1">
										<label class="form-check-label" for="production1">Peu productrice</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="production" id="production2" value="2">
										<label class="form-check-label" for="production2">Moyennement productrice</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="production" id="production3" value="3">
										<label class="form-check-label" for="production3">Trés productrice</label>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="form-check form-check-inline col-sm-5">
									<label class="form-check-label" for="boxImg">Joindre une image&nbsp;</label>
									<input class="form-check-input" type="checkbox" name="boxImg" id="boxImg" value="1">
								</div>
							</div>
							<div class="input-group col-sm-6" id="divImg">
								<div class="input-group-prepend">
									<span class="input-group-text">Ajouter une image</span>
								</div>
								<div class="custom-file">
									<input type="text" class="custom-file-input" id="imgFile" name="imgFile">
									<label class="custom-file-label" for="imgFile">Selectionner un fichier</label>
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
                    
                    <div>
                    	
                    </div>
                </div>
                
                <div data-page="4" id="page4" style="display:none;">
                    <p>Content for Div Number 4</p>
                </div>
                
                <div data-page="5" id="page5" style="display:none;">
                    <p>Content for Div Number 5</p>
                </div>
                
                <div data-page="6" id="page6" style="display:none;">
                    <p>Content for Div Number 6</p>
                </div>
                
                <div data-page="7" id="page7" style="display:none;">
                    <p>Content for Div Number 7</p>
                </div>
                
                <div data-page="8" id="page8" style="display:none;">
                    <p>Content for Div Number 8</p>
                </div>
                
                <meta name="description"/>
                
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