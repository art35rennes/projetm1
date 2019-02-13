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
   $.post( window.location.pathname+"/suppr", { file: $link, _token:$('#_token').val()} );
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
            $.post( window.location.pathname+"/maj", { dataName: $input.name ,data: $input.val(), _token:$('#_token').val()} );
        }
    }
    else {
        if ($input.prop('disabled')) {
            $input.prop('disabled', false);
        } else {
            $input.prop('disabled', true);
            $.post( window.location.pathname+"/maj", { dataName: $input.name ,data: $input.val(), _token:$('#_token').val()} );
        }
    }
});

$('.faForm').click(function () {
    var $form = $(this);
    console.log();
    $(this).parent().parent().children(":first-child").next().children().children().submit();
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
                    //console.log("p");
                    $data.empty()
                    $data.append($lastdata.children().clone());
                    $data.children().children("input").val($value.text());
                    //console.log($lastdata.children());
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
$('.checkPostRow').click(function () {
    //console.log("post row");

    var $lastrow = $(this).parent().parent().next();

    while($lastrow[0].className != "editZone"){
        $lastrow=$lastrow.next();
    }
    var $lastdata = $lastrow.children(":last-child");

    var $form = new FormData();
    var $data=$(this).parent();

    while ($data.is("td")){
        var $value = $data.children(":first-child");

        if (!$value.is("span") && !$value.is("i") && !$value.is("a")){

            $value=$value.children(":first-child");
            if(!$value.is("input")){
                $value=$value.children(":first-child");
            }
            //console.log($value.attr('name')+"  "+$value.attr('type'));
            //console.log($value);

            if($value.attr('type')=="file"){
                $form.append($value.attr('name'), $value[0].files[0]);
            }
            else{
                $form.append($value.attr('name'), $value.val());
            }
        }

        $data=$data.prev();
        $lastdata=$lastdata.prev();
    }
    var $dataPost = {_token:$('#_token').val()};

    //console.log($form);
    for (var $i=0; $i<$form.size;$i++){
        $dataPost.append($form[$i]);
    }

    $.post( window.location.pathname+"/maj",  $dataPost);
});