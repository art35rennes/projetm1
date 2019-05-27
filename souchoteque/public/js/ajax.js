function alerteInfo(type, text, text2="") {
    let html;
    switch (type) {
        case 'info':
            html = "<div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">\n" +
                "  <strong>Réponse du serveur: </strong>"+text+"\n<hr>"+text2+"\n" +
                "  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
                "    <span aria-hidden=\"true\">&times;</span>\n" +
                "  </button>\n" +
                "</div>";
            return html;
        case 'warning':
            break;
        case 'alert':
            break;
        case 'success':
            updateData();
            html = "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">\n" +
                "  <strong>Réponse du serveur: </strong>"+text+"\n" +
                "  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
                "    <span aria-hidden=\"true\">&times;</span>\n" +
                "  </button>\n" +
                "</div>";
            return html;
            break;
        default:
            html = "<div class=\"alert alert-light alert-dismissible fade show\" role=\"alert\">\n" +
                "  <strong>Réponse du serveur: </strong> <pre>"+text+"</pre>\n" +
                "  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
                "    <span aria-hidden=\"true\">&times;</span>\n" +
                "  </button>\n" +
                "</div>";
            return html;
    }
}

//..................................//
//.............Objects..............//
//..................................//

//Onglet
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

var publication = function(nom, date, publication, isNew, oldKey=null){
    this.nom = nom;
    this.date = date;
    this.publication = publication;
    this.new = isNew;
    this.oldKey = oldKey;
    this.onglet = "publication";
};

var exclusivite = function(id, debut, fin, partenaire, secteur, isNew, oldKey=null){
    this.id = id;
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

//EPS, PHA, Autre
var objectivation = function(type, nom, protocole, resultat, isNew, oldKey=null){
    this.type = type;
    this.nom = nom;
    this.protocole = protocole;
    this.resultat = resultat;
    this.new = isNew;
    this.oldKey = oldKey;
    this.onglet = "objectivation";
};

var industriel = function(type, production, date, lieu, protocole, resultat, isNew, oldKey=null){
    this.type = type;
    this.production = production;
    this.date = date;
    this.lieu = lieu;
    this.protocole = protocole;
    this.resultat = resultat;
    this.new = isNew;
    this.oldKey = oldKey;
    this.onglet = "industriel";
};

var criblage = function(type, nom, condition, rapport, isNew, oldKey=null){
    this.type = type;
    this.nom = nom;
    this.condition = condition;
    this.rapport = rapport;
    this.new = isNew;
    this.oldKey = oldKey;
    this.onglet = "criblage";
};

var oses = function(type, nom, isNew){
    this.type = type;
    this.nom = nom;
    this.isNew = isNew;
    this.onglet = 'oses';
};

var caracterisation = function(poid, nom, fichier, type=null){
    this.poid = poid;
    this.nom = nom;
    this.fichier = fichier;
    this.onglet = "caracterisation";
    this.type = type;
};

var projetLiee = function(reference) {
    this.reference = reference;
    this.onglet = 'projet associe';
};

//..................................//
//.............Get Files............//
//..................................//

//function pour input dans tableau

$datas = [];
function getFileInput(parent ,n, name, index=($datas.length-1)){

    //console.log(index);
    if (!parent.is('input')){
        //console.log('is not input');
        $file = parent.children().eq(n).find(':first-child');
    }
    else{
        //console.log('is input');
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
                //console.log($datas);
                //console.log($datas[0]._token);
                if(typeof $datas[0]._token !== 'undefined'){
                    console.log('index ++');
                    index++;
                }
                console.log('index: '+index+', name: '+name);
                $datas[index][name] = (new Object({
                    name: myFile.name,
                    size: myFile.size,
                    lastModified: myFile.lastModified,
                    type: myFile.type,
                    data: reader.result,
                    state: reader.readyState
                }));
            };
            //console.log(myFile);
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

//..................................//
//.............Ajax Post............//
//..................................//
function sendAjax($url, $id='#server-results') {
    if ($datas.length > 0) {
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
        }).done(function (response) {
            $json = JSON.parse(response);
            console.log($json);
            $($id).html(alerteInfo($json[0].alert,$json[1]));
        });
    }
    else {
        $($id).html(alerteInfo('info',"Aucune donnée à envoyer.",));
    }

}

//......................................//
//.............Ajax Request.............//
//......................................//
$(".updateBtn").click(function(){
    $datas = [];

    //on recupere l'onglet actif
    $id = $(".nav-link.active").attr('href');

    //console.log($id);
    if ($id != '#pills-description') {
        let tabEPA;
        switch($id) {
            case '#pills-eps':
                console.log('eps');
                //caracterisation
                if ($('#eps-poid_moleculaire').is('input')) {
                    $datas.push(new caracterisation(
                        $('#eps-poid_moleculaire').val(),
                        $('[name=eps-fichier_caracterisation-type]').val(),
                        null,
                        'eps'
                    ));
                    getFileInput($('[name=eps-fichier_caracterisation-fichier]'), 0, 'fichier', $datas.length-1)
                }

                //oses
                let osesTab = ["neutre", "acide", "amine"];
                osesTab.forEach(function(item, index){
                    $($id).find(".oses").eq(index).find('tr').each(function () {
                        $(this).each(function () {
                            if ($(this).is('tr') && !$(this).find(':first-child').hasClass('dataTables_empty') &&
                                !$(this).children(':first-child').is('th') &&
                                $(this).find('input').eq(0).val() !== "") {

                                //console.log(getFileInput($(this), 1));
                                //on initialise l'objet pour l'inserer dans datas
                                $datas.push(new oses(
                                    item,
                                    $(this).find('input').eq(0).val(),
                                    $(this).hasClass('editZone'),
                                ));
                            }
                        });
                    });
                });

                //Tab
                tabEPA = [".ObjectivationEps", ".ProductionInduEps", ".CriblageEps"];
                tabEPA.forEach(function (item) {
                    $($id).find(item).find('.tabEps').eq(0).find('tr').each(function () {
                        $(this).each(function () {
                            if ($(this).is('tr') && !$(this).find(':first-child').hasClass('dataTables_empty') &&
                                !$(this).children(':first-child').is('th') &&
                                $(this).find('input').eq(0).val() !== "") {

                                switch (item) {
                                    case ".ObjectivationEps":
                                        $datas.push(new objectivation(
                                            'eps',
                                            $(this).find('input').eq(0).val(),
                                            null,
                                            null,
                                            $(this).hasClass('editZone'),
                                        ));
                                        getFileInput($(this), 2, 'protocole', $datas.length-1);
                                        getFileInput($(this), 3, 'resultat', $datas.length-1);
                                        break;
                                    case ".ProductionInduEps":
                                        $datas.push(new industriel(
                                            'eps',
                                            $(this).find('input').eq(0).val(),
                                            $(this).find('input').eq(2).val(),
                                            $(this).find('input').eq(3).val(),
                                            null,
                                            null,
                                            $(this).hasClass('editZone'),
                                        ));
                                        getFileInput($(this), 4, 'protocole', $datas.length-1);
                                        getFileInput($(this), 5, 'resultat', $datas.length-1);
                                        break;
                                    case ".CriblageEps":
                                        $datas.push(new criblage(
                                            'eps',
                                            $(this).find('input').eq(0).val(),
                                            null,
                                            null,
                                            $(this).hasClass('editZone'),
                                        ));
                                        getFileInput($(this), 2, 'condition', $datas.length-1);
                                        getFileInput($(this), 3, 'rapport', $datas.length-1);
                                        break;
                                }

                            }
                        });
                    });
                });



                break;
            case '#pills-pha':
                console.log('pha');
                //caracterisation
                if ($('#pha-poid_moleculaire').is('input')) {
                    $datas.push(new caracterisation(
                        $('#pha-poid_moleculaire').val(),
                        $('[name=pha-fichier_caracterisation-type]').val(),
                        null,
                        'pha'
                    ));
                    getFileInput($('[name=pha-fichier_caracterisation-fichier]'), 0, 'fichier', $datas.length-1)
                }


                //Tab
                tabEPA = [".ObjectivationPha", ".ProductionInduPha", ".CriblagePha"];
                tabEPA.forEach(function (item) {
                    $($id).find(item).find('.tabPha').eq(0).find('tr').each(function () {
                        $(this).each(function () {
                            if ($(this).is('tr') && !$(this).find(':first-child').hasClass('dataTables_empty') &&
                                !$(this).children(':first-child').is('th') &&
                                $(this).find('input').eq(0).val() !== "") {

                                switch (item) {
                                    case ".ObjectivationPha":
                                        $datas.push(new objectivation(
                                            'pha',
                                            $(this).find('input').eq(0).val(),
                                            null,
                                            null,
                                            $(this).hasClass('editZone'),
                                        ));
                                        getFileInput($(this), 2, 'protocole', $datas.length-1);
                                        getFileInput($(this), 3, 'resultat', $datas.length-1);
                                        break;
                                    case ".ProductionInduPha":
                                        $datas.push(new industriel(
                                            'pha',
                                            $(this).find('input').eq(0).val(),
                                            $(this).find('input').eq(2).val(),
                                            $(this).find('input').eq(3).val(),
                                            null,
                                            null,
                                            $(this).hasClass('editZone'),
                                        ));
                                        getFileInput($(this), 4, 'protocole', $datas.length-1);
                                        getFileInput($(this), 5, 'resultat', $datas.length-1);
                                        break;
                                    case ".CriblagePha":
                                        $datas.push(new criblage(
                                            'pha',
                                            $(this).find('input').eq(0).val(),
                                            null,
                                            null,
                                            $(this).hasClass('editZone'),
                                        ));
                                        getFileInput($(this), 2, 'condition', $datas.length-1);
                                        getFileInput($(this), 3, 'rapport', $datas.length-1);
                                        break;
                                }

                            }
                        });
                    });
                });
                break;
            case '#pills-autre':
                console.log('autre');
                //caracterisation
                if ($('#autre-poid_moleculaire').is('input')) {
                    $datas.push(new caracterisation(
                        $('#autre-poid_moleculaire').val(),
                        $('[name=autre-fichier_caracterisation-type]').val(),
                        null,
                        'autre'
                    ));
                    getFileInput($('[name=autre-fichier_caracterisation-fichier]'), 0, 'fichier', $datas.length-1)
                }

                //Tab
                tabEPA = [".ObjectivationAutre", ".ProductionInduAutre", ".CriblageAutre"];
                tabEPA.forEach(function (item) {
                    $($id).find(item).find('.tabAutre').eq(0).find('tr').each(function () {
                        $(this).each(function () {
                            if ($(this).is('tr') && !$(this).find(':first-child').hasClass('dataTables_empty') &&
                                !$(this).children(':first-child').is('th') &&
                                $(this).find('input').eq(0).val() !== "") {

                                switch (item) {
                                    case ".ObjectivationAutre":
                                        $datas.push(new objectivation(
                                            'autre',
                                            $(this).find('input').eq(0).val(),
                                            null,
                                            null,
                                            $(this).hasClass('editZone'),
                                        ));
                                        getFileInput($(this), 2, 'protocole', $datas.length-1);
                                        getFileInput($(this), 3, 'resultat', $datas.length-1);
                                        break;
                                    case ".ProductionInduAutre":
                                        $datas.push(new industriel(
                                            'autre',
                                            $(this).find('input').eq(0).val(),
                                            $(this).find('input').eq(2).val(),
                                            $(this).find('input').eq(3).val(),
                                            null,
                                            null,
                                            $(this).hasClass('editZone'),
                                        ));
                                        getFileInput($(this), 4, 'protocole', $datas.length-1);
                                        getFileInput($(this), 5, 'resultat', $datas.length-1);
                                        break;
                                    case ".CriblageAutre":
                                        $datas.push(new criblage(
                                            'autre',
                                            $(this).find('input').eq(0).val(),
                                            null,
                                            null,
                                            $(this).hasClass('editZone'),
                                        ));
                                        getFileInput($(this), 2, 'condition', $datas.length-1);
                                        getFileInput($(this), 3, 'rapport', $datas.length-1);
                                        break;
                                }

                            }
                        });
                    });
                });
                break;
            default:
                $($id).find("tr").each(function () {
                    switch ($id) {
                        case '#pills-identification':
                            //console.log('identification');

                            //on parse le tableau de l'onglet
                            $(this).each(function () {
                                if ($(this).is('tr') && !$(this).find(':first-child').hasClass('dataTables_empty') &&
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
                                    getFileInput($(this), 1, 'sequence', $datas.length-1);
                                    getFileInput($(this), 2, 'arbre', $datas.length-1);
                                }
                            });
                            break;
                        case '#pills-pasteur':
                            console.log('pasteur');
                            $(this).each(function () {
                                //console.log($(this).find('input').eq(5));
                                if ($(this).is('tr') && !$(this).find(':first-child').hasClass('dataTables_empty') &&
                                    !$(this).children(':first-child').is('th') &&
                                    $(this).find('input').eq(1).val() !== "") {

                                    $datas.push(new pasteur(
                                        $(this).find('input').eq(0).val(),
                                        $(this).find('input').eq(1).val(),
                                        $(this).find('input').eq(3).val(),
                                        null,
                                        null,
                                        $(this).find('input').eq(4).val(),
                                        null,
                                        $(this).hasClass('editZone')
                                    ));
                                    getFileInput($(this), 5, 'dossier', $datas.length-1);
                                    getFileInput($(this), 6, 'validation', $datas.length-1);
                                    getFileInput($(this), 7, 'photo', $datas.length-1);
                                }
                            });
                            break;
                        case '#pills-brevet':
                            console.log('brevet');
                            $(this).each(function () {
                                //console.log($(this).find('input').eq(5));
                                if ($(this).is('tr') && !$(this).find(':first-child').hasClass('dataTables_empty') &&
                                    !$(this).children(':first-child').is('th') &&
                                    $(this).find('input').eq(1).val() !== "") {

                                    $datas.push(new brevet(
                                        $(this).find('input').eq(0).val(),
                                        $(this).find('input').eq(1).val(),
                                        $(this).find('input').eq(3).val(),
                                        $(this).find('input').eq(4).val(),
                                        null,
                                        null,
                                        $(this).hasClass('editZone')
                                    ));
                                    getFileInput($(this), 5, 'texte', $datas.length-1);
                                    getFileInput($(this), 6, 'inpi', $datas.length-1);
                                }
                            });
                            break;
                        case '#pills-publication':
                            console.log('publication');
                            $(this).each(function () {
                                //console.log($(this).find('input').eq(5));
                                if ($(this).is('tr') && !$(this).find(':first-child').hasClass('dataTables_empty') &&
                                    !$(this).children(':first-child').is('th') &&
                                    $(this).find('input').eq(2).val() !== "") {

                                    $datas.push(new publication(
                                        $(this).find('input').eq(1).val(),
                                        $(this).find('input').eq(0).val(),
                                        null,
                                        $(this).hasClass('editZone')
                                    ));
                                    getFileInput($(this), 3, 'publication', $datas.length-1);
                                }
                            });
                            break;
                        case '#pills-exclisivite':
                            console.log('exclu');
                            $(this).each(function () {
                                //console.log($(this).find('input').eq(5));
                                if ($(this).is('tr') && !$(this).find(':first-child').hasClass('dataTables_empty') &&
                                    !$(this).children(':first-child').is('th') &&
                                    $(this).find('input').eq(1).val() !== "") {

                                    $datas.push(new exclusivite(
                                        $(this).find('input').eq(0).val(),
                                        $(this).find('input').eq(2).val(),
                                        $(this).find('input').eq(3).val(),
                                        $(this).find('input').eq(4).val(),
                                        $(this).find('input').eq(5).val(),
                                        $(this).hasClass('editZone')
                                    ));
                                }
                            });
                            break;
                        case '#pills-projet':
                            console.log('projet');
                            $(this).each(function () {
                                //console.log($(this).find('input').eq(5));
                                if ($(this).is('tr') && !$(this).find(':first-child').hasClass('dataTables_empty') &&
                                    !$(this).children(':first-child').is('th') &&
                                    $(this).find('input').eq(1).val() !== "") {

                                    $datas.push(new projet(
                                        $(this).find('input').eq(0).val(),
                                        $(this).find('input').eq(2).val(),
                                        $(this).find('input').eq(3).val(),
                                        $(this).find('input').eq(4).val(),
                                        null,
                                        $(this).hasClass('editZone')
                                    ));
                                    getFileInput($(this), 5, 'document', $datas.length-1);
                                }
                            });
                            break;
                    }
                });
        }
    }
    else{
        console.log('desc');
        $datas.push(new description(
            $('#photo_souche-description').val(),
            getFileInput($('#photo_souche-fichier'), 0, 'photo', $datas.length-1),
            $('#description-texte').val(),
            getFileInput($('#description-file'), 0, 'description', $datas.length-1),
            $('#souche-origine').val(),
            $('#souche-annee_collecte').val(),
            $('#isOgm').val(),
            $('#isOgm').val()?$('#souche-annee_creation').val():null,
            $('#isOgm').val()?$('[name=souche-hcb-type]:checked').val():null,
            $('#isOgm').val()?getFileInput($('#souche-hcb-doc'),0,'fichier', $datas.length-1):null
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
    console.log($datas);
    sendAjax('/souche/' + ($("#ref")[0].innerHTML) + "/update/cryotube");
});

$('.cryoStock').click(function () {

    $datas = [];

    console.log($(this).parent().parent().find('.numero')[0].innerHTML);
    $datas.push(new cryotube(
        $(this).parent().parent().find('.numero')[0].innerHTML,
        $(this).hasClass('fa-minus')?-1:1
    ));
    console.log($datas);
    sendAjax('/souche/' + $(this).parent().parent().find('.reference')[0].innerHTML + "/update/cryotube");
});

//.......................................//
//.............Ajax Response.............//
//.......................................//

function updateData() {

    window.location.reload();
    /*console.log($datas);
    $id = $(".nav-link.active").attr('href');

    $.each($datas, function () {
        //console.log($(this)[0].onglet);
        let $data = $(this)[0];

        if ($data.new) {
            console.log('new');
            $.post("/blade/generate/row",
                {
                    _token: $('input[name=_token]').val(),
                    id:$("#ref")[0].innerHTML,
                },
                function(data, status){ //retreive response
                    console.log("Data: " + (data) + "\nStatus: " + status);
                    if(status === "success"){
                        $('#identification').html((data));
                    }
                    else{
                        alerteInfo('info', status, data);
                    }
                });
        }else{
            console.log('notNew');
        }
     switch ($data.onglet) {
           case 'description':
               console.log(0);
               break;
           case 'identification':
               if ($data.new) {
                   console.log('new');
                   console.log(JSON.stringify($data));
                   $.post("/blade/generate/row",
                       {
                           _token: $('input[name=_token]').val(),
                           data:JSON.stringify($data),
                       },
                       function(data, status){ //retreive response
                           console.log("Data: " + data + "\nStatus: " + status);
                           if(status === "success"){
                               $('#identification').find('tbody').append(data);
                           }
                           else{
                               alerteInfo('info', status, data);
                           }
                       });
               }else{
                   console.log('notNew');
               }
               //console.log(1);
               break;
           case 'pasteur':
               console.log(2);
               break;
           case 'publication':
               console.log(3);
               break;
           case 'exclusivite':
               console.log(4);
               break;
           case 'projet':
               console.log(5);
               break;
           case 'cryotube':
               console.log(6);
               break;
           case 'objectivation':
               console.log(7);
               break;
           case 'industriel':
               console.log(8);
               break;
           case 'criblage':
               console.log(9);
               break;
           case 'oses':
               console.log(10);
               break;
           case 'caracterisation':
               console.log(11);
               break;
           case 'projetLiee':
               console.log(12);
               break;
           case undefined:
               console.log(13);
               break;
           default:
               console.log('defaut');
               window.location.reload();
       }
    });*/
}

//..................................//
//...........Delete entry...........//
//..................................//
function fileDelete($href){
    $.post("/souche/"+($("#ref")[0].innerHTML)+"/suppr/file",      // send HTTP POST request to a page and get the answer
        {
            _token: $('input[name=_token]').val(),       // send data
            href:$href
        },
        function(data, status){ //retreive response
            console.log("Data: " + data + "\nStatus: " + status);
            if(status === "success"){
                //alerteInfo(data[0].alert, status, data);
                window.location.reload()
                //TODO : décommenter
            }
            else{
                window.location.reload()
                alerteInfo('info', status, data);
            }
        });
}

function deleteTabEntry(table, key, onglet=null){
    console.log(table, key, onglet);
    $.post("/souche/"+($("#ref")[0].innerHTML)+"/suppr",      // send HTTP POST request to a page and get the answer
        {
            _token: $('input[name=_token]').val(),       // send data
            table:table,
            key:key,
            onglet:onglet
        },
        function(data, status){ //retreive response
            console.log("Data: " + data + "\nStatus: " + status);
            if(status === "success"){
                window.location.reload()
                //TODO : décommenter
            }
            else{
                window.location.reload()
                alerteInfo('info', status, data);
            }
        });
}

//..................................//
//...........Restore entry..........//
//..................................//

function restoreEntry(date) {
    console.log(date);
    $.post("/historique/restore",      // send HTTP POST request to a page and get the answer
        {
            _token: $('input[name=_token]').val(),       // send data
            table:date,
        },
        function(data, status){ //retreive response
            console.log("Data: " + data + "\nStatus: " + status);
            if(status === "success"){
                window.location.reload()
                //TODO : décommenter
            }
            else{
                alerteInfo('info', status, data);
            }
        });
}