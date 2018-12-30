//page 1
$("#page1").on('hide',function(){
	//console.log("1");
	$("#bPage1").removeClass('active');
});
$("#page1").on('show',function(){
	//console.log("2");
	$("#bPage1").addClass('active');
});

//page 2
$("#page2").on('hide',function(){
	//console.log("11");
	$("#bPage2").removeClass('active');
});
$("#page2").on('show',function(){
	//console.log("22");
	$("#bPage2").addClass('active');
});

//page3
$("#page3").on('hide',function(){
	//console.log("111");
	$("#bPage3").removeClass('active');
});
$("#page3").on('show',function(){
	//console.log("222");
	$("#bPage3").addClass('active');
});

//page 4
$("#page4").on('hide',function(){
	//console.log("1111");
	$("#bPage4").removeClass('active');
});
$("#page4").on('show',function(){
	//console.log("2222");
	$("#bPage4").addClass('active');
});

//page 5
$("#page5").on('hide',function(){
	//console.log("11111");
	$("#bPage5").removeClass('active');
});
$("#page5").on('show',function(){
	//console.log("22222");
	$("#bPage5").addClass('active');
});

//page 6
$("#page6").on('hide',function(){
	//console.log("111");
	$("#bPage6").removeClass('active');
});
$("#page6").on('show',function(){
	//console.log("222");
	$("#bPage6").addClass('active');
});

//page 7
$("#page7").on('hide',function(){
	//console.log("1111");
	$("#bPage7").removeClass('active');
});
$("#page7").on('show',function(){
	//console.log("2222");
	$("#bPage7").addClass('active');
});

//page 8
$("#page8").on('hide',function(){
	//console.log("11111");
	$("#bPage8").removeClass('active');
});
$("#page8").on('show',function(){
	//console.log("22222");
	$("#bPage8").addClass('active');
});
//
//------------------------------------------------
//

$("#registerNum").keypress(function(){
    console.log("update");
	if(($("#registerNum").val()).length > 2){
		$("#aPage3").text((($("#registerNum").val()).slice(0,3)).toUpperCase());
	}
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
  
  var boxImg = $("#boxImg");
  var divImg = $("#divImg");
  divImg.hide();
  boxImg.change(function() {
	if (boxImg.is(':checked')) {
	  divImg.show();
	} else {
	  divImg.hide();
	}
  });
  
});



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