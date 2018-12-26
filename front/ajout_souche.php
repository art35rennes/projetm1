<!doctype html>
<html>
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
               <h4 class="display-4">Ajout d'une souche</h5>
                <div data-page="1" >
                    <h4>Collection bactérienne</h4>
                    <br>
                    <div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Origine de la collection :</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="" placeholder="...">
						</div>
					</div>
               
               		<h4>Description de la souche</h4>
                    <br>
                    <!-- Macroscopique !-->
                    <section alt="Macroscopie">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Observation macroscopique :</label>
							<div class="col-sm-5">
								<textarea class="form-control"></textarea>
							</div>
						</div>
						<div class="input-group col-sm-6">
						<div class="input-group-prepend">
							<span class="input-group-text">Ajouter une image</span>
						</div>
						<div class="custom-file">
							<input type="text" class="custom-file-input" id="">
							<label class="custom-file-label" for="">Selectionner un fichier</label>
						</div>
					</div>
              		</section>
               		
               		<br>
               		<!-- Microscopique !-->
               		<section alt="Microscopie">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Observation microscopique :</label>
							<div class="col-sm-5">
								<textarea class="form-control"></textarea>
							</div>
						</div>
						<div class="input-group col-sm-6">
							<div class="input-group-prepend">
								<span class="input-group-text">Ajouter une image</span>
							</div>
							<div class="custom-file">
								<input type="text" class="custom-file-input" id="">
								<label class="custom-file-label" for="">Selectionner un fichier</label>
							</div>
						</div>
              		</section>
               		
               		<br>
               		<!-- Biologue !-->
               		<section alt="Biologue">
						<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Etude Biologue :</label>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="">Effectué&nbsp;</label>
								<input class="form-check-input" type="checkbox" name="biolog" id="boxBiolog" value="option1">
							</div>
						</div>
						<div class="input-group col-sm-6" id="divBiolog">
							<label for="" class="col-sm-3 col-form-label">Référence :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="inputEmail3" placeholder="...">
							</div>
						</div>
             		</section>
              		
               		<br>
               		<!-- ARN 16S !-->
               		<section alt="ARN 16S">
						<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Etude ARN 16S :</label>
							<div class="form-check form-check-inline col-sm-5">
								<label class="form-check-label" for="">Effectué&nbsp;</label>
								<input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="boxArn" value="option1">
							</div>
						</div>
						<div class="input-group col-sm-6" id="divArn">
							<div class="input-group-prepend">
								<span class="input-group-text">Ajouter un fichier</span>
							</div>
							<div class="custom-file">
								<input type="text" class="custom-file-input" id="">
								<label class="custom-file-label" for="">Selectionner un fichier</label>
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
        
	</body>
	
	<footer>
	    <?php
		   include "ressource/html/footer.html"
		?>
	</footer>
</html>