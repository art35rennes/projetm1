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
                                <label class="form-check-label" for="radioAutre">Autre&nbsp;</label>
                                <input class="form-check-input" type="radio" name="radioType" id="radioAutre" value="2">
                            </div>
                        </div>
                    </section>
               
                </div>
                
                <!-- Culture -->
                <div data-page="2" id="page2" style="display:none;">
                    
                </div>
                
                <!-- EPS || SHA -->
                <div data-page="3" id="page3" style="display:none;">
                    
                  
                </div>
                
                <!-- Caractérisation -->
                <div data-page="4" id="page4" style="display:none;">
                    
                </div>
                
                <!-- Hémi synthèse -->
                <div data-page="5" id="page5" style="display:none;">
                    
                </div>
                
                <!-- Activité -->
                <div data-page="6" id="page6" style="display:none;">
                    
                    
                </div>
                
                <!-- Industrie -->
                <div data-page="7" id="page7" style="display:none;">
                    
                </div>
                
                <!-- Publication -->
                <div data-page="8" id="page8" style="display:none;">
                    
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