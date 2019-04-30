var identification = function(type, sequence, arbre, isNew){
    this.type = type;
    this.sequence = sequence;
    this.arbre = arbre;
    this.new = isNew;
};

function getFileInput(n){

}

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
                      $datas.push(new identification(
                          $(this).find('input:first-child').val(),
                          getFileInput(1),
                          0?[]:null,
                          !!$(this).hasClass('editZone')));
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
    $datas.unshift({'_token' : $('input[name=_token]').val()})
    console.log($datas);
    console.log($("#ref")[0].innerHTML);

    var post_url = '/souche/'+($("#ref")[0].innerHTML)+"/update"; //get form action url
    var request_method = 'POST'; //get form GET/POST method
    var form_data = JSON.stringify($datas);
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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