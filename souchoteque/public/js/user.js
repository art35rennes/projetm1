$(".fa-check").toggle();

function hex2bin(hex){
    return (parseInt(hex, 16).toString(2)).padStart(27, '0');
}

$("select.selectLaw").each(function(){
    $res = $(this).attr("name").split("-");
    $res = $res[1];

    $lvl = $("#accreditation-"+ $res).val();
    $lvl = hex2bin($lvl);
    //console.log($lvl);
    $lvl = $lvl.slice(3*$res,3*$res+3);

    $(this).children().each(function(){
        if($(this).val()==$lvl){
            $(this).attr("selected", true);
        }
    });
});

$(".fa-pen").click(function(){

    if($(this).parent().is('td')){
        var $data = $(this).parent();

        while ($data.is('td')){
            var $value = $data.children(":first-child");

            if($value.is("select")){
                if ($value.prop('disabled')) {
                    $value.prop('disabled', false);
                } else {
                    $value.prop('disabled', true);
                }
            }
            if($value.is("input")){
                if ($value.prop('readonly')) {
                    $value.prop('readonly', false);
                } else {
                    $value.prop('readonly', true);
                }
            }
            $data=$data.prev();
        }
    }
    $(this).toggle();
    $(this).next().toggle();
});

$(".fa-trash").click(function (){
    $(this).parent().submit();
});

$('.faForm').click(function () {
    $("#majForm").submit();
});