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
function getFileInput(parent ,n){
    $file = parent.children().eq(n).find(':first-child');
    if ($file.is('label')){
        //console.log($file.find('input').prop('files'));
        return typeof($file.find('input').prop('files')[0])!=="undefined"?
            new FormData($file.find('input')):null;
    }
    else{
        return null;
    }
}

//function pour input simple
function getFileInputById($el){
    return typeof($('#'+$el).prop('files')[0])!=="undefined"?$el.prop('files')[0]:null;
}

//..................................//
//.............Ajax Post............//
//..................................//

function sendAjax($datas, $url, $id='#server-results') {

    $datas.unshift({'_token': $('input[name=_token]').val()})
    console.log($datas);

    var post_url = $url; //get form action url
    var request_method = 'POST'; //get form GET/POST method
    var form_data = JSON.stringify($datas);
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: post_url,
        type: request_method,
        data: form_data,
        contentType: false,
        cache: false,
        processData: false
    }).done(function (response) { //
        $($id).html(response);
    });
}
//......................................//
//.............Ajax Request.............//
//......................................//
$("#updateBtn").click(function(){
    $datas = [];

    $id = $(".nav-link.active").attr('href');
    //console.log($id);
    if ($id != '#pills-description') {
        $($id).find("tr").each(function () {
            switch ($id) {
                case '#pills-identification':
                    console.log('iden');
                    $(this).each(function () {
                        if ($(this).is('tr') &&
                            !$(this).children(':first-child').is('th') &&
                            $(this).find('input').eq(0).val() !== "") {

                            $datas.push(new identification(
                                $(this).find('input').eq(0).val(),
                                getFileInput($(this), 1),
                                getFileInput($(this), 2),
                                $(this).hasClass('editZone')
                            ));
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
                                getFileInput($(this), 4),
                                getFileInput($(this), 5),
                                $(this).find('input').eq(3).val(),
                                getFileInput($(this), 6),
                                $(this).hasClass('editZone')
                            ));
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
                                getFileInput($(this), 4),
                                getFileInput($(this), 5),
                                $(this).hasClass('editZone')
                            ));
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
                                getFileInput($(this), 1),
                                $(this).hasClass('editZone')
                            ));
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
                                getFileInput($(this), 4),
                                $(this).hasClass('editZone')
                            ));
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
            document.getElementsByName('photo_souche/description').values(),
            getFileInputById('photo_souche/fichier'),
            document.getElementsByName('description/texte').values(),
            getFileInputById('description/file'),
            document.getElementsByName('souche/origine').values(),
            document.getElementsByName('souche/annee_collecte').values(),
            document.getElementsByName('isOgm').values(),
            $('#isOgm').val()?document.getElementsByName('souche/annee_creation').values():null,
            $('#isOgm').val()?document.getElementsByName('souche/hcb/type').values():null,
            $('#isOgm').val()?getFileInputById('souche/hcb/doc'):null
        ));
    }

    sendAjax($datas, '/souche/' + ($("#ref")[0].innerHTML) + "/update");
});

$(".cryoBtn").click(function () {
    $datas = [];

    $datas.push(new cryotube(
        $(this).parent().find('.cryoRef').val(),
        $(this).hasClass('fa-minus')?-1:1
    ));

    sendAjax($datas, '/souche/' + ($("#ref")[0].innerHTML) + "/update/cryotube");
});