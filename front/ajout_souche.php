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
                <div data-page="1" >
                    <p>Content for Div Number 1</p>
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