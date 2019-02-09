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