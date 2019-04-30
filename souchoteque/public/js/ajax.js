$("#formSouche").submit(function(event){
    event.preventDefault(); //prevent default action

});

var Obj = function(name) {
    this.name = name
}
var c = new Obj("hello");
var identification = function(type, sequence, arbre, isNew){
    this.type = type;
    this.sequence = sequence;
    this.arbre = arbre;
    this.new = isNew;
};

$("#updateBtn").click(function(){
    $datas = [];

    console.log("get");
    $id = $(".nav-link.active").attr('href');
    console.log($id);
    $($id).find("tr").each(function () {
       switch ($id) {
           case '#pills-description':
               console.log('desc');
               break;
           case '#pills-identification':
               console.log('iden');
               $(this).each(function () {
                  if ($(this).is('tr') && !$(this).children(':first-child').is('th')){
                      $datas.push(new identification(null,null,null,false));
                  }
               });
               break;
           case '#pills-pasteur':
               console.log('pasteur');
               break;
           case '#pills-brevet':
               console.log('brevet');
               break;
           case '#pills-publication':
               console.log('publication');
               break;
           case '#pills-exclisivite':
               console.log('exclu');
               break;
           case '#pills-projet':
               console.log('projet');
               break;
           case '#pills-eps':
               console.log('eps');
               break;
           case '#pills-pha':
               console.log('pha');
               break;
           case '#pills-autre':
               console.log('autre');
               break;
           default:
       }
    });
    console.log($datas);

    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = JSON.stringify($datas);
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data,
        contentType: false,
        cache: false,
        processData:false
    }).done(function(response){ //
        //$("#server-results").html(response);
    });
});