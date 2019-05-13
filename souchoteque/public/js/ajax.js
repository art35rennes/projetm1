//..................................//
//.............Objects..............//
//..................................//

var description = function(textarea, photo, nom, description, collecte, annee, ogm, creation, type, fichier){
    this.textarea = photo===null?null:textarea;
    this.photo = textarea===""?null:photo;
    this.nom = description===null?null:nom;
    this.description = nom===""?null:description;
    this.collecte = collecte;
    this.annee = annee;
    this.ogm = ogm;
    this.creation = ogm?creation:null;
    this.type = ogm?type:null;
    this.fichier = ogm?fichier:null;
    this.onglet = "description";
};

var identification = function(type, sequence, arbre, isNew, oldKey=null){
    this.type = type;
    this.sequence = sequence;
    this.arbre = arbre;
    this.new = isNew;
    this.oldKey = oldKey;
    this.onglet = "identification";
};

var pasteur = function(date, titre, numero, dossier, validation, stock, photo, isNew, oldKey=null){
    this.date = date;
    this.titre = titre;
    this.numero = numero;
    this.dossier = dossier;
    this.validation = validation;
    this.stock = stock;
    this.photo = photo;
    this.new = isNew;
    this.oldKey = oldKey;
    this.onglet = "pasteur";
};

var brevet = function(numero, titre, demande, secteur, texte, inpi, isNew, oldKey=null){
    this.numero = numero;
    this.titre = titre;
    this.demande = demande;
    this.secteur = secteur;
    this.texte = texte;
    this.inpi = inpi;
    this.new = isNew;
    this.oldKey = oldKey;
    this.onglet = "brevet";
};

var publication = function(date, publication, isNew, oldKey=null){
    this.date = date;
    this.publication = publication;
    this.new = isNew;
    this.oldKey = oldKey;
    this.onglet = "publication";
};

var exclusivite = function(debut, fin, partenaire, secteur, isNew, oldKey=null){
    this.debut = debut;
    this.fin = fin;
    this.partenaire = partenaire;
    this.secteur = secteur;
    this.new = isNew;
    this.oldKey = oldKey;
    this.onglet = "exclusivite";
};

var projet = function(nom, date, partenaire, secteur, document, isNew, oldKey=null){
    this.nom = nom;
    this.date = date;
    this.partenaire = partenaire;
    this.secteur = secteur;
    this.document = document;
    this.new = isNew;
    this.oldKey = oldKey;
    this.onglet = "projet";
};

var cryotube = function(reference, n) {
    this.reference = reference;
    this.n = n;
};

//..................................//
//.............Get Files............//
//..................................//

//function pour input dans tableau
/*function getFileInput(parent ,n){
    return new Promise((resolve) =>
    {
        $file = parent.children().eq(n).find(':first-child');

        if ($file.is('label')) {
            //td don't have file
            //console.log($file.find('input').attr('name'));

            if (typeof ($file.find('input').prop('files')[0]) !== "undefined") {
                //console.log(document.getElementsByName($file.find('input').attr('name'))[0]['files'][0]);
                var myFile = document.getElementsByName($file.find('input').attr('name'))[0]['files'][0];
                var reader = new FileReader();
                reader.onloadend = function (event) {
                    return (new Object({
                        name: myFile.name,
                        size: myFile.size,
                        lastModified: myFile.lastModified,
                        type: myFile.type,
                        data: reader.result
                    }));
                };
                reader.readAsDataURL(myFile);
            }
        }
    })
}
*/

$datas = [];
function getFileInput(parent ,n, name){

    if (!parent.is('input')){
        $file = parent.children().eq(n).find(':first-child');
    }
    else{
        $file = parent.parent();
    }

    //console.log($file);
    if ($file.is('label')) {
        //td don't have file
        //console.log($file.find('input').attr('name'));

        if (typeof ($file.find('input').prop('files')[0]) !== "undefined") {
            //console.log(document.getElementsByName($file.find('input').attr('name'))[0]['files'][0]);
            let myFile = document.getElementsByName($file.find('input').attr('name'))[0]['files'][0];
            let reader = new FileReader();
            reader.onloadend = function (event) {
                $datas[$datas.length - 1][name] = (new Object({
                    name: myFile.name,
                    size: myFile.size,
                    lastModified: myFile.lastModified,
                    type: myFile.type,
                    data: reader.result,
                    state: reader.readyState
                }));
            };
            reader.readAsDataURL(myFile);
        }
    }

}

function checkReadyState(){
    var min = 2;
    $datas.forEach(function (data) {
        switch ((typeof data).toString()) {
            case 'description':
                break;
            case 'identification':
                if (data.sequence != null && data.sequence.state < min){
                    min = data.sequence.state < min;
                }
                if (data.arbre != null && data.arbre.state < min){
                    min = data.arbre.state < min;
                }
                break;
            case 'pasteur':
                if (data.dossier != null && data.dossier.state < min){
                    min = data.dossier.state < min;
                }
                if (data.validation != null && data.validation.state < min){
                    min = data.validation.state < min;
                }
                if (data.photo != null && data.photo.state < min){
                    min = data.photo.state < min;
                }
                break;
            case 'brevet':
                if (data.texte != null && data.texte.state < min){
                    min = data.texte.state < min;
                }
                if (data.inpi != null && data.inpi.state < min){
                    min = data.inpi.state < min;
                }
                break;
            case 'publication':
                if (data.publication != null && data.publication.state < min){
                    min = data.publication.state < min;
                }
                break;
            case 'projet':
                if (data.document != null && data.document.state < min){
                    min = data.document.state < min;
                }
                break;
        }
    });
    return min;
}

//function pour input simple
/*function getFileInputById($el){
    console.log($el);
    return typeof($('#'+$el).prop('files')[0])!=="undefined"?$el.prop('files')[0]:null;
}*/

//..................................//
//.............Ajax Post............//
//..................................//
function sendAjax($url, $id='#server-results') {
    
    //ajout du token CSRF
    $datas.unshift({'_token': $('input[name=_token]').val()})
    console.log($datas);

    var post_url = $url; //get form action url
    var request_method = 'POST'; //get form GET/POST method
    var form_data = JSON.stringify($datas, null, 2);

    //console.log((form_data));

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: post_url,
        type: request_method,
        data: form_data,
        contentType: false,
        cache: false,
        processData: false
    }).done(function (response) { //
        //console.log(response);
        $($id).html(response);
    });
}
//......................................//
//.............Ajax Request.............//
//......................................//
$("#updateBtn").click(function(){
    $datas = [];

    //on recupere l'onglet actif
    $id = $(".nav-link.active").attr('href');

    //console.log($id);
    if ($id != '#pills-description') {
        $($id).find("tr").each(function () {
            switch ($id) {
                case '#pills-identification':
                    //console.log('identification');

                    //on parse le tableau de l'onglet
                    $(this).each(function () {
                        if ($(this).is('tr') &&
                            !$(this).children(':first-child').is('th') &&
                            $(this).find('input').eq(0).val() !== "") {

                            //console.log(getFileInput($(this), 1));
                            //on initialise l'objet pour l'inserer dans datas
                            $datas.push(new identification(
                                $(this).find('input').eq(0).val(),
                                null,
                                null,
                                $(this).hasClass('editZone'),
                                $(this).find('input').eq(0).attr('oldKey')
                            ));
                            getFileInput($(this), 1, 'sequence');
                            getFileInput($(this), 2, 'arbre');
                        }
                    });
                    break;
                case '#pills-pasteur':
                    console.log('pasteur');
                    $(this).each(function () {
                        //console.log($(this).find('input').eq(5));
                        if ($(this).is('tr') &&
                            !$(this).children(':first-child').is('th') &&
                            $(this).find('input').eq(1).val() !== "") {

                            $datas.push(new pasteur(
                                $(this).find('input').eq(0).val(),
                                $(this).find('input').eq(1).val(),
                                $(this).find('input').eq(2).val(),
                                null,
                                null,
                                $(this).find('input').eq(3).val(),
                                null,
                                $(this).hasClass('editZone')
                            ));
                            getFileInput($(this), 4, 'dossier');
                            getFileInput($(this), 5, 'validation');
                            getFileInput($(this), 6, 'photo');
                        }
                    });
                    break;
                case '#pills-brevet':
                    console.log('brevet');
                    $(this).each(function () {
                        //console.log($(this).find('input').eq(5));
                        if ($(this).is('tr') &&
                            !$(this).children(':first-child').is('th') &&
                            $(this).find('input').eq(1).val() !== "") {

                            $datas.push(new brevet(
                                $(this).find('input').eq(0).val(),
                                $(this).find('input').eq(1).val(),
                                $(this).find('input').eq(2).val(),
                                $(this).find('input').eq(3).val(),
                                null,
                                null,
                                $(this).hasClass('editZone')
                            ));
                            getFileInput($(this), 4, 'texte');
                            getFileInput($(this), 5, 'inpi');
                        }
                    });
                    break;
                case '#pills-publication':
                    console.log('publication');
                    $(this).each(function () {
                        //console.log($(this).find('input').eq(5));
                        if ($(this).is('tr') &&
                            !$(this).children(':first-child').is('th') &&
                            $(this).find('input').eq(1).val() !== "") {

                            $datas.push(new publication(
                                $(this).find('input').eq(0).val(),
                                null,
                                $(this).hasClass('editZone')
                            ));
                            getFileInput($(this), 1, 'publication');
                        }
                    });
                    break;
                case '#pills-exclisivite':
                    console.log('exclu');
                    $(this).each(function () {
                        //console.log($(this).find('input').eq(5));
                        if ($(this).is('tr') &&
                            !$(this).children(':first-child').is('th') &&
                            $(this).find('input').eq(1).val() !== "") {

                            $datas.push(new exclusivite(
                                $(this).find('input').eq(0).val(),
                                $(this).find('input').eq(1).val(),
                                $(this).find('input').eq(2).val(),
                                $(this).find('input').eq(3).val(),
                                $(this).hasClass('editZone')
                            ));
                        }
                    });
                    break;
                case '#pills-projet':
                    console.log('projet');
                    $(this).each(function () {
                        //console.log($(this).find('input').eq(5));
                        if ($(this).is('tr') &&
                            !$(this).children(':first-child').is('th') &&
                            $(this).find('input').eq(1).val() !== "") {

                            $datas.push(new projet(
                                $(this).find('input').eq(0).val(),
                                $(this).find('input').eq(1).val(),
                                $(this).find('input').eq(2).val(),
                                $(this).find('input').eq(3).val(),
                                null,
                                $(this).hasClass('editZone')
                            ));
                            getFileInput($(this), 4, 'document');
                        }
                    });
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

            }
        });
    }
    else{
        console.log('desc');
        $datas.push(new description(
            $('#photo_souche-description').val(),
            getFileInput($('#photo_souche-fichier'), 0, 'photo'),
            $('#description-texte').val(),
            getFileInput($('#description-file'), 0, 'description'),
            $('#souche-origine').val(),
            $('#souche-annee_collecte').val(),
            $('#isOgm').val(),
            $('#isOgm').val()?$('#souche-annee_creation').val():null,
            $('#isOgm').val()?$('[name=souche-hcb-type]:checked').val():null,
            $('#isOgm').val()?getFileInput($('#souche-hcb-doc'),0,'fichier'):null
        ));
    }

    $interval = setInterval(
        function() {
                if (checkReadyState() === 2){
                    clearInterval($interval);
                    sendAjax( '/souche/' + ($("#ref")[0].innerHTML) + "/update");
                }
            },
        100
    );
});

$(".cryoBtn").click(function () {
    $datas = [];

    $datas.push(new cryotube(
        $(this).parent().find('.cryoRef').val(),
        $(this).hasClass('fa-minus')?-1:1
    ));

    sendAjax($datas, '/souche/' + ($("#ref")[0].innerHTML) + "/update/cryotube");
});