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
                <div data-page="1" >
                    <h4>Collection bactérienne</h4>
                    <br>
                    <!-- Collection !-->
                    <section>
						<div class="form-group row">
							<h6 class="col-sm-3 col-form-label">Origine de la collection :</h6>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="collectionDesc" name="collectionDesc" placeholder="...">
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
								<textarea class="form-control" name="macroDesc"></textarea>
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
								<textarea class="form-control" name="microDesc"></textarea>
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
                <div data-page="2" style="display:none;">
                    <p>Content for Div Number 2</p>
                </div>
                <div data-page="3" style="display:none;">
                    <p>Content for Div Number 3</p>
                </div>
                <div data-page="4" style="display:none;">
                    <p>Content for Div Number 4</p>
                </div>
                <div data-page="5" style="display:none;">
                    <p>Content for Div Number 5</p>
                </div>
                <div data-page="6" style="display:none;">
                    <p>Content for Div Number 6</p>
                </div>
                <div data-page="7" style="display:none;">
                    <p>Content for Div Number 7</p>
                </div>
                <div data-page="8" style="display:none;">
                    <p>Content for Div Number 8</p>
                </div>
                
                <br><br>
                
                <div class="justify-content-end">
                    <button class="btn btn-info" type="submit">Ajouter à la base</button>
                </div>
                
                <br>

                <div class="pagination pagination-centered justify-content-center">
                    <ul class="pagination ">
                        <li class="page-item" data-page="-"><a class="page-link bg-dark text-white" href="#addForm" >Pr&eacute;c&eacute;dent</a></li>
                        <li class="page-item" data-page="1"><a class="page-link" href="#addForm" >Description</a></li>
                        <li class="page-item" data-page="2"><a class="page-link" href="#addForm" >Culture</a></li>
                        <li class="page-item" data-page="3"><a class="page-link" href="#addForm" >Type</a></li>
                        <li class="page-item" data-page="4"><a class="page-link" href="#addForm" >Caractérisation</a></li>
                        <li class="page-item" data-page="5"><a class="page-link" href="#addForm" >Hémi&nbsp;Synthése</a></li>
                        <li class="page-item" data-page="6"><a class="page-link" href="#addForm" >Activité</a></li>
                        <li class="page-item" data-page="7"><a class="page-link" href="#addForm" >Industrie</a></li>
                        <li class="page-item" data-page="8"><a class="page-link" href="#addForm" >Publication</a></li>
                        <li class="page-item" data-page="+"><a class="page-link bg-dark text-white" href="#addForm" >Suivant</a></li>
                    </ul>
                </div>
            </form>
        </div>
        
        <?php
		   include "ressource/html/script.html"
		?>
        <script>

			//checkbox 
			$(function() {
  
  			  var boxArbre = $("#boxArbre");
			  var divArbre = $("#divArbre");
			  divArbre.hide();
			  boxArbre.change(function() {
			 	console.log("change");
				if (boxArbre.is(':checked')) {
				  divArbre.show();
				  console.log("la");
				} else {
				  divArbre.hide();
				  console.log("ici");
				}
			  });
  				
			  var boxArn = $("#boxArn");
			  var divArn = $("#divArn");
			  divArn.hide();
			  boxArn.change(function() {
			 	console.log("change");
				if (boxArn.is(':checked')) {
				  divArn.show();
				  console.log("la");
				} else {
				  divArn.hide();
				  console.log("ici");
				}
			  });
			  
			  var boxEmbl = $("#boxEmbl");
			  var divEmbl = $("#divEmbl");
			  divEmbl.hide();
			  boxEmbl.change(function() {
				if (boxEmbl.is(':checked')) {
				  divEmbl.show();
				} else {
				  divEmbl.hide();
				}
			  });
			  
			  var boxBlast = $("#boxBlast");
			  var divBlast = $("#divBlast");
			  divBlast.hide();
			  boxBlast.change(function() {
				if (boxBlast.is(':checked')) {
				  divBlast.show();
				} else {
				  divBlast.hide();
				}
			  });
			  
			  var boxPasteur = $("#boxPasteur");
			  var divPasteur = $("#divPasteur");
			  divPasteur.hide();
			  boxPasteur.change(function() {
				if (boxPasteur.is(':checked')) {
				  divPasteur.show();
				} else {
				  divPasteur.hide();
				}
			  });
			  
			   var boxBiolog = $("#boxBiolog");
			  var divBiolog = $("#divBiolog");
			  divBiolog.hide();
			  boxBiolog.change(function() {
				if (boxBiolog.is(':checked')) {
				  divBiolog.show();
				} else {
				  divBiolog.hide();
				}
			  });
			  
			  var boxApi = $("#boxApi");
			  var divApi = $("#divApi");
			  divApi.hide();
			  boxApi.change(function() {
				if (boxApi.is(':checked')) {
				  divApi.show();
				} else {
				  divApi.hide();
				}
			  });
			});
			
			
			//pagination
            var paginationHandler = function(){
                // store pagination container so we only select it once
                var $paginationContainer = $(".pagination-container"),
                    $pagination = $paginationContainer.find('.pagination ul');
                // click event
                $pagination.find("li a").on('click.pageChange',function(e){
                    e.preventDefault();
                    // get parent li's data-page attribute and current page
                var parentLiPage = $(this).parent('li').data("page"),
                currentPage = parseInt( $(".pagination-container div[data-page]:visible").data('page') ),
                numPages = $paginationContainer.find("div[data-page]").length;
                // make sure they aren't clicking the current page
                if ( parseInt(parentLiPage) !== parseInt(currentPage) ) {
                // hide the current page
                $paginationContainer.find("div[data-page]:visible").hide();
                if ( parentLiPage === '+' ) {
                            // next page
                    $paginationContainer.find("div[data-page="+( currentPage+1>numPages ? numPages : currentPage+1 )+"]").show();
                } else if ( parentLiPage === '-' ) {
                            // previous page
                    $paginationContainer.find("div[data-page="+( currentPage-1<1 ? 1 : currentPage-1 )+"]").show();
                } else {
                    // specific page
                    $paginationContainer.find("div[data-page="+parseInt(parentLiPage)+"]").show();
                        }
                    }
                });
            };
            $( document ).ready( paginationHandler );
        </script>
        
        <footer>
			<?php
			   include "ressource/html/footer.html"
			?>
		</footer>
	</body>
	
	
</html>