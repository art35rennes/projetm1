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
		<form class="form-inline">
				<div class="input-group input-group-sm mb-3">
				
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroup-sizing-sm">Référence&nbsp;</span>
					</div>
					<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
					
					<div class="input-group-prepend">
						<span class="input-group-text" id="i">Souche&nbsp;</span>
					</div>
					<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
					
					<div class="input-group-prepend">
						<span class="input-group-text" id="inp">Type&nbsp;</span>
					</div>
					<select class="form-control" id="exampleFormControlSelect1">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
					
					<div class="input-group-prepend">
						<span class="input-group-text" id="inpu">Rendement&nbsp;</span>
					</div>
					<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
					
					<div class="input-group-prepend">
						<span class="input-group-text" id="input">Date&nbsp;</span>
					</div>
					<input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
					
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputG">Fiche&nbsp;</span>
					</div>
					<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
					
					<div class="input-group-append">
					<button class="btn btn-outline-secondary" type="button" id="button-addon2">Filtrer</button>
					</div>
				</div>
		</form>
		</div>
		
		<br>
		
		<div class="container text-center">
			<table class="table table-striped table-bordered table-hover">
				<tbody>
					<tr>
						<th scope="col">Référence</th>
						<th scope="col">Souche</th>
						<th scope="col">Type</th>
						<th scope="col">Rendement</th>
						<th scope="col">Date</th>
                        <th scope="col">Fiche</th>
						<th scope="col">&nbsp;</th>
					</tr>
					<tr>
						<td>so-8b</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><a href="fiche.html">une fiche</a></td>
						<td>
							<i class="far fa-edit"></i>
							<i class="far fa-trash-alt"></i>
						</td>
					</tr>
					<tr>
						<td>so-9b</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><a href="fiche.html">une fiche</a></td>
						<td>
							<i class="far fa-edit"></i>
							<i class="far fa-trash-alt"></i>
						</td>
					</tr>
					<tr>
						<td>so-10b</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><a href="fiche.html">une fiche</a></td>
						<td>
							<i class="far fa-edit"></i>
							<i class="far fa-trash-alt"></i>
						</td>
					</tr>
					<tr>
						<td>so-1a</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><a href="fiche.html">une fiche</a></td>
						<td>
							<i class="far fa-edit"></i>
							<i class="far fa-trash-alt"></i>
						</td>
					</tr>
					<tr>
						<td>so-2a</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><a href="fiche.html">une fiche</a></td>
						<td>
							<i class="far fa-edit"></i>
							<i class="far fa-trash-alt"></i>
						</td>
					</tr>
					<tr>
						<td>so-3a-r</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><a href="fiche.html">une fiche</a></td>
						<td>
							<i class="far fa-edit"></i>
							<i class="far fa-trash-alt"></i>
						</td>
					</tr>
					<tr>
						<td>so-3a-b</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><a href="fiche.html">une fiche</a></td>
						<td>
							<i class="far fa-edit"></i>
							<i class="far fa-trash-alt"></i>
						</td>
					</tr>
					<tr>
						<td>so-3a-t</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><a href="fiche.html">une fiche</a></td>
						<td>
							<i class="far fa-edit"></i>
							<i class="far fa-trash-alt"></i>
						</td>
					</tr>
				</tbody>
			</table>
	</div>
		
	    <?php
		   include "ressource/html/script.html"
		?>

	</body>
	
	<footer>
	    <?php
		   include "ressource/html/footer.html"
		?>
	</footer>
</html>
