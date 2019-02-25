function submitMaj(){
    $("#majForm").submit();
}

$(".editButton").hide();
$(".editZone").hide();

$("#editMode").click( function(){
    $(".editButton").toggle();
    $(".editZone").toggle();
});

//Toggle EPS
$("#checkCaracterisationEps").click(function(){
    $(".CaracterisationEps").toggle();
})

$("#checkObjectivationEps").click(function(){
    $(".ObjectivationEps").toggle();
})

$("#checkProductionInduEps").click(function(){
    $(".ProductionInduEps").toggle();
})

$("#checkCriblageEps").click(function(){
    $(".CriblageEps").toggle();
})

//Toggle PHA
$("#checkCaracterisationPha").click(function(){
    $(".CaracterisationPha").toggle();
})

$("#checkObjectivationPha").click(function(){
    $(".ObjectivationPha").toggle();
})

$("#checkProductionInduPha").click(function(){
    $(".ProductionInduPha").toggle();
})

$("#checkCriblagePha").click(function(){
    $(".CriblagePha").toggle();
})

//Toggle Autre
$("#checkCaracterisationAutre").click(function(){
    $(".CaracterisationAutre").toggle();
})

$("#checkObjectivationAutre").click(function(){
    $(".ObjectivationAutre").toggle();
})

$("#checkProductionInduAutre").click(function(){
    $(".ProductionInduAutre").toggle();
})

$("#checkCriblageAutre").click(function(){
    $(".CriblageAutre").toggle();
})

//Delete file
$("i.deleteCross").click(function (){
   var $link = $(this).prev().attr("href");
   $.post( window.location.pathname+"/suppr", { "file": $link, "_token":$('#_token').val()} );
});

//Unlock Edit
$('i.unlockEdit').click(function () {
   
    var $input = $(this).parent().parent().prev();
    $(this).toggleClass('fa-lock');
    $(this).toggleClass('fa-unlock');

    if($input.is('input')){
        if ($input.prop('readonly')){
            $input.prop('readonly', false);
        }
        else{
            $input.prop('readonly', true);
            submitMaj();
        }
    }
    else {
        if ($input.prop('disabled')) {
            $input.prop('disabled', false);
        } else {
            $input.prop('disabled', true);
            submitMaj();
        }
    }
});

//OGM
if($('#isOgm').val()=="Oui"){
    $('#ogmPlus').show();
}
else{
    $('#ogmPlus').hide();
}
if($('#isHcb').val()=="Oui"){
    $('#hcbAdd').show();
}
else{
    $('#hcbAdd').hide();
}

$('.showSelect').change(function () {
    var $div = $(this).parent().next();
    while (!$div.is('div')){
        $div.next();
    }

    if(!$(this).prop('selectedIndex')){
        $div.show();
    }
    else{
        $div.hide();
    }
});

//Edit Tab
$('.fa-pen').click(function () {
    if($(this).parent().is('td')){
        var $data = $(this).parent();
        var $lastrow = $(this).parent().parent().next();

        while($lastrow[0].className != "editZone"){
            $lastrow=$lastrow.next();
        }
        var $lastdata = $lastrow.children(":last-child");

        while ($data.is('td')){
            var $value = $data.children(":first-child");

            if($value.is("a")){
                //console.log('a');
            }
            else {
                if ($value.is("p")){
                    //console.log("p "+$value.text());
                    $data.empty()
                    $data.append($lastdata.children().clone());
                    $data.children().children("input").val($value.text());
                    $data.children().children("input").attr("name",$data.children().children("input").attr("name")+"/"+$data.parent().index());
                    //console.log($data.children().children("input"));
                }
                else {
                    if ($value.is("i")){
                        //console.log("i");
                        $value.toggle();
                        $value.next().toggle()
                    }
                    else{
                        if (!$($value).is(':parent')){
                            //console.log('vide')
                            $data.empty()
                            $data.append($lastdata.children().clone());
                            $data.children().children().children().attr("name",$data.children().children().children().attr("name")+"/"+$data.parent().index());
                            //console.log($lastdata.children());
                        }
                    }
                }
            }
            $data=$data.prev();
            $lastdata=$lastdata.prev();
        }
    }
});

$(".checkPostRow").hide();
$(".checkPostRow").click(function () {
    submitMaj();
});
$('.faForm').click(function () {
    submitMaj();
});
