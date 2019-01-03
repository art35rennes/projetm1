var $type;

$("#registerNum").keyup(function(){
    console.log("update");
	if(($("#registerNum").val()).length > 2){
		$type = (($("#registerNum").val()).slice(0,3)).toUpperCase();
		switchType();
	}
});

$("#radioPha").click(function(){
	$type = "PHA";
	switchType();
});
$("#radioEps").click(function(){
	$type = "EPS";
	switchType();
});

function switchType(){
	$("#aPage3").text($type);
	if($type==="PHA"){
		console.log("Pha");
		$("#criblagePha").show();
		$("#caracterisationPha").show();
		$("#hemiPha").show();
		$("#actiPha").show();

		$("#criblageEps").hide();
		$("#caracterisationEps").hide();
		$("#hemiEps").hide();
		$("#actiEps").hide();
	}else{
		console.log("no Pha: "+$type);
		if($type==="EPS"){
			console.log("Eps");
			$("#criblagePha").hide();
			$("#caracterisationPha").hide();
			$("#hemiPha").hide();
			$("#actiPha").hide();

			$("#criblageEps").show();
			$("#caracterisationEps").show();
			$("#hemiEps").show();
			$("#actiEps").show();
		}
	}
}

//
//------------------------------------------------
//

$("#domaineDivIndustrie").hide();
$("#domaineIndustrie").change(function(){
	if($("#domaineIndustrie").val()=="new"){
		$("#domaineDivIndustrie").show();
	}
	else{
		$("#domaineDivIndustrie").hide();
	}
});

$("#activiteDivBrevet").hide();
$("#activiteBrevet").change(function(){
	if($("#activiteBrevet").val()=="new"){
		$("#activiteDivBrevet").show();
	}
	else{
		$("#activiteDivBrevet").hide();
	}
});

$("#activiteDivLettre").hide();
$("#activiteLettre").change(function(){
	if($("#activiteLettre").val()=="new"){
		$("#activiteDivLettre").show();
	}
	else{
		$("#activiteDivLettre").hide();
	}
});

//
//------------------------------------------------
//

$("#pasteurNum").keyup(function(){
	$("#pasteurNumBis").val($("#pasteurNum").val());
});

$("#pasteurNumBis").keyup(function(){
	$("#pasteurNum").val($("#pasteurNumBis").val());
});

//
//------------------------------------------------
//
//checkbox 
$(function() {

  var boxArbre = $("#boxArbre");
  var divArbre = $("#divArbre");
  divArbre.hide();
  boxArbre.change(function() {
	if (boxArbre.is(':checked')) {
	  divArbre.show();
	} else {
	  divArbre.hide();
	}
  });

  var boxArn = $("#boxArn");
  var divArn = $("#divArn");
  divArn.hide();
  boxArn.change(function() {
	if (boxArn.is(':checked')) {
	  divArn.show();
	} else {
	  divArn.hide();
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
	  divPasteurBis.show();
	  $("#boxPasteurBis").prop('checked', true);
	} else {
	  divPasteur.hide();
	  divPasteurBis.hide();
	  $("#boxPasteurBis").prop('checked', false);
	}
  });
  
  var boxPasteurBis = $("#boxPasteurBis");
  var divPasteurBis = $("#divPasteurBis");
  divPasteurBis.hide();
  boxPasteurBis.change(function() {
	if (boxPasteurBis.is(':checked')) {
	  divPasteurBis.show();
	  divPasteur.show();
	  $("#boxPasteur").prop('checked', true);
	} else {
	  divPasteurBis.hide();
	  divPasteur.hide();
	  $("#boxPasteur").prop('checked', false);
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
  
  var boxOpti = $("#boxOpti");
  var divOpti = $("#divOpti");
  divOpti.hide();
  boxOpti.change(function() {
	if (boxOpti.is(':checked')) {
	  divOpti.show();
	} else {
 console.log("ici");
	}
  });
  
  var radioOui = $("#radioOui");
  var divOui = $("#divOui");
  divOui.hide();
  radioOui.change(function() {
	if (radioOui.is(':checked')) {
	  divOui.show();
	  divNon.hide();
	} else {
	  divOui.hide();
	  divNon.show();
	}
  });
  
  var radioNon = $("#radioNon");
  var divNon = $("#divNon");
  divNon.hide();
  radioNon.change(function() {
	if (radioNon.is(':checked')) {
	  divNon.show();
	  divOui.hide();
	} else {
	  divNon.hide();
	  divOui.show();
	}
  });
  
  var boxImgEps = $("#boxImgEps");
  var divImgEps = $("#divImgEps");
  divImgEps.hide();
  boxImgEps.change(function() {
	if (boxImgEps.is(':checked')) {
	  divImgEps.show();
	} else {
	  divImgEps.hide();
	}
  });
  
  var boxImgPha = $("#boxImgPha");
  var divImgPha = $("#divImgPha");
  divImgPha.hide();
  boxImgPha.change(function() {
	if (boxImgPha.is(':checked')) {
	  divImgPha.show();
	} else {
	  divImgPha.hide();
	}
  });
  
  var boxSpectroEps = $("#boxSpectroEps");
  var divSpectroEps = $("#divSpectroEps");
  divSpectroEps.hide();
  boxSpectroEps.change(function() {
	if (boxSpectroEps.is(':checked')) {
	  divSpectroEps.show();
	} else {
	  divSpectroEps.hide();
	}
  });
  
  var boxOsidiqueEps = $("#boxOsidiqueEps");
  var divOsidiqueEps1 = $("#divOsidiqueEps1");
  var divOsidiqueEps2 = $("#divOsidiqueEps2");
  divOsidiqueEps1.hide();
  divOsidiqueEps2.hide();
  boxOsidiqueEps.change(function() {
	if (boxOsidiqueEps.is(':checked')) {
	  divOsidiqueEps1.show();
	  divOsidiqueEps2.show();
	} else {
	  divOsidiqueEps1.hide();
	  divOsidiqueEps2.hide();
	}
  });
  
  var boxAnalyseEps = $("#boxAnalyseEps");
  var divAnalyseEps = $("#divAnalyseEps");
  divAnalyseEps.hide();
  boxAnalyseEps.change(function() {
	if (boxAnalyseEps.is(':checked')) {
	  divAnalyseEps.show();
	} else {
	  divAnalyseEps.hide();
	}
  });
  
  var boxRmnEps = $("#boxRmnEps");
  var divRmnEps = $("#divRmnEps");
  divRmnEps.hide();
  boxRmnEps.change(function() {
	if (boxRmnEps.is(':checked')) {
	  divRmnEps.show();
	} else {
	  divRmnEps.hide();
	}
  });
  
  var boxRmnPha = $("#boxRmnPha");
  var divRmnPha = $("#divRmnPha");
  divRmnPha.hide();
  boxRmnPha.change(function() {
	if (boxRmnPha.is(':checked')) {
	  divRmnPha.show();
	} else {
	  divRmnPha.hide();
	}
  });
  
  var boxHplcEps = $("#boxHplcEps");
  var divHplcEps1 = $("#divHplcEps1");
  var divHplcEps2 = $("#divHplcEps2");
  divHplcEps1.hide();
  divHplcEps2.hide();
  boxHplcEps.change(function() {
	if (boxHplcEps.is(':checked')) {
	  divHplcEps1.show();
	  divHplcEps2.show();
	} else {
	  divHplcEps1.hide();
	  divHplcEps2.hide();
	}
  });
  
  var boxIsisEps = $("#boxIsisEps");
  var divIsisEps = $("#divIsisEps");
  divIsisEps.hide();
  boxIsisEps.change(function() {
	if (boxIsisEps.is(':checked')) {
	  divIsisEps.show();
	} else {
	  divIsisEps.hide();
	}
  });
  
  var boxIsisPha = $("#boxIsisPha");
  var divIsisPha = $("#divIsisPha");
  divIsisPha.hide();
  boxIsisPha.change(function() {
	if (boxIsisPha.is(':checked')) {
	  divIsisPha.show();
	} else {
	  divIsisPha.hide();
	}
  });
  
  var industrielRadioOui = $("#industrielRadioOui");
  var industrielDivOui = $("#industrielDivOui");
  industrielDivOui.hide();
  industrielRadioOui.change(function() {
	if (industrielRadioOui.is(':checked')) {
	  industrielDivOui.show();
	} else {
	  industrielDivOui.hide();
	}
  });
  
  var industrielRadioNon = $("#industrielRadioNon");
  industrielDivOui.hide();
  industrielRadioNon.change(function() {
	if (industrielRadioNon.is(':checked')) {
	  industrielDivOui.hide();
	}
  });
  
});
//
//------------------------------------------------
//

(function ($) {
  $.each(['show', 'hide'], function (i, ev) {
	var el = $.fn[ev];
	$.fn[ev] = function () {
	  this.trigger(ev);
	  return el.apply(this, arguments);
	};
  });
})(jQuery);

//
//------------------------------------------------
//
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
			$("#bPage"+currentPage).toggleClass("active");
			if ( parentLiPage === '+' ) {
						// next page
				$paginationContainer.find("div[data-page="+( currentPage+1>numPages ? numPages : currentPage+1 )+"]").show();
				$("#bPage"+( currentPage+1>numPages ? numPages : currentPage+1 )).toggleClass("active");
			} else if ( parentLiPage === '-' ) {
						// previous page
				$paginationContainer.find("div[data-page="+( currentPage-1<1 ? 1 : currentPage-1 )+"]").show();
				$("#bPage"+( currentPage-1<1 ? 1 : currentPage-1 )).toggleClass("active");
			} else {
				// specific page
				$paginationContainer.find("div[data-page="+parseInt(parentLiPage)+"]").show();
				$("#bPage"+parseInt(parentLiPage)).toggleClass("active");
			}
		}
	});
};
$( document ).ready( paginationHandler );