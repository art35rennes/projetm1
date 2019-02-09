refs = [
    @foreach($souches as $souche)
    "{{$souche->ref}}",
    @endforeach()
];

$("#ref").keyup(function () {
    if (refs.indexOf($("#ref").val()) != -1)
    {
        $("#ref").attr("class", "form-control is-invalid");
        $("#ajout").attr('disabled','disabled');
    }else{
        $("#ref").attr("class", "form-control");
        $("#ajout").removeAttr('disabled')
    }
});

var isOGM = $("#isOGM");
var divOGM = $("#OGM");
var divNotOGM = $("#notOGM");

divOGM.hide();

isOGM.change(function() {
    if (isOGM.is(':checked')) {
        divOGM.show();
        divNotOGM.hide();
    } else {
        divOGM.hide();
        divNotOGM.show();
    }
});