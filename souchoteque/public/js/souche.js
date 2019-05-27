$(document).ready( function () {
    //..................................//
    //..........Initialisation..........//
    //..................................//

    $(".editButton").hide();
    $(".editZone").hide();


    $droit = {
        souche: $('[name=souche]').val(),
        identification: $('[name=identification]').val(),
        eps: $('[name=eps]').val(),
        pha: $('[name=pha]').val(),
        autre: $('[name=autre]').val(),
        pasteur: $('[name=pasteur]').val(),
        brevet: $('[name=brevet]').val(),
        exclusivite: $('[name=exclusivite]').val(),
        publication: $('[name=publication]').val(),
        utilisateur: $('[name=utilisateur]').val(),
        description: $('[name=description]').val(),
        projet: $('[name=projet]').val(),
        cryotube: $('[name=cryotube]').val(),
    };
    $('#userData').remove();

    $(function() {
        $('a[data-toggle="pill"]').on('click', function(e) {
            //console.log('store');
            window.localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = window.localStorage.getItem('activeTab');
        if (activeTab) {
            $('a[href="' + activeTab + '"]').tab('show');
            window.localStorage.removeItem("activeTab");
        }
    });

    //..................................//
    //...........Data Table.............//
    //..................................//

    $('#identification, #pasteur, #brevet, #publication, #exclisivite, #projet').DataTable({
        "paging":   false,
        "info":     false,
        "language":{
            "search":"Rechercher",
            "emptyTable":"Aucune donnée à afficher",
        },
        "columnDefs": [
            { targets: 'editZone', orderable: false }
        ]
    });

    $('.tabEps, .tabPha, .tabAutre').each(function () {
       $(this).DataTable({
           "paging":   false,
           "info":     false,
           "language":{
               "search":"Rechercher",
               "emptyTable":"Aucune donnée à afficher",
           },
           "columnDefs": [
               { targets: 'editZone', orderable: false }
           ]
       });
    });

    $('.oses').each(function () {
       $(this).DataTable({
           "paging": false,
           "info": false,
           "searching": false,
           "language":{
               "search":"Rechercher",
               "emptyTable":"Aucune donnée à afficher",
           },
           "columnDefs": [
               { targets: 'editZone', orderable: false }
           ]
       });
    });

    //..................................//
    //............Edit mode.............//
    //..................................//

    function convertSpan() {
        $(".inputText, .inputDate").each(function () {
            if ($(this).is("span")) {
                $(this).replaceWith(function () {
                    return $("<input>", {
                        class: this.className,
                        name: this.id,
                        id: this.id,
                        value: this.innerHTML,
                        type: $(this).hasClass('inputText') ?
                            "text" : $(this).hasClass('inputDate') ?
                                "number" : null,
                    });
                });
            } else {
                $(this).replaceWith(function () {
                    return $("<span>", {
                        class: this.className,
                        id: this.name,
                        innerHTML: this.value
                    });
                });
            }
        });
        $(".inputText, .inputDate").each(function () {
            if ($(this).is("span")) {
                $(this).removeClass("form-control");
                $(this).html($(this).attr('innerhtml'));
            }
            else{
                $(this).addClass("form-control");
            }
        });

        $(".inputYn").each(function () {
            if ($(this).is("span")) {
                $(this).replaceWith(function () {
                    return $("<select>", {
                        class: this.className,
                        name: this.id,
                        id: this.id,
                        value: this.innerHTML,
                    });
                });
            } else {
                $(this).replaceWith(function () {
                    return $("<span>", {
                        class: this.className,
                        id: this.name,
                        innerHTML: this.options[this.selectedIndex].text
                    });
                });
            }
        });
        $(".inputYn").each(function () {
            if ($(this).is('select')) {
                $(this).addClass("form-control");
                $oui = "<option value='1'>Oui</option>";
                $non = "<option value='0'>Non</option>";
                $(this).append($oui);
                $(this).append($non);
                $(this).children().each(function () {
                    $(this).val() == 1 ? $(this).attr("selected", true) : null;
                    $(this).val() == 0 ? null : $(this).attr("selected", true);
                });
            } else {
                $(this).removeClass("form-control");
                $(this).html($(this).attr('innerhtml'));
            }
        });
    }

    function convertTr(){
        $(".tabText, .tabDate, .tabNum").each(function () {
            if ($(this).is("span")) {
                //console.log($(this).next().is('input')&&$(this).next().val()=="isKey"?true:false);
                $(this).replaceWith(function () {
                    return $("<input>", {
                        class: this.className,
                        name: this.id,
                        value: this.innerHTML,
                        type:$(this).hasClass('tabText') ?
                            "text" : $(this).hasClass('tabDate') ?
                                "date" : $(this).hasClass('tabNum') ?
                                    "number":null,
                        list: this.list,
                    });
                });
            } else {
                $(this).replaceWith(function () {
                    return $("<span>", {
                        class: this.className,
                        id: this.name,
                        innerHTML: this.value,
                        list: this.list,
                    });
                });
            }
        });
        $(".tabText, .tabDate, .tabNum").each(function () {
            if ($(this).is("span")) {
                $(this).removeClass("form-control");
                $(this).html($(this).attr('innerhtml'));
                //$(this).removeAttribute('disabled');
            }
            else{
                $(this).addClass("form-control");
                $(this).next().is('input')&&$(this).next().val()=="isKey"?$(this).attr('disabled','disabled'):null;
            }
        });

        $(".tabFile").each(function () {
            if ($(this).next().is("i")){
                $(this).next().remove();
            }else{
                $fa = "<i class='fas fa-trash' onclick='fileDelete(\""+
                    $(this).attr('href')
                    +"\")'></i>";
                $(this).after($fa);
            }
        });

        $(".tabNull").each(function () {
            if ($(this).is("span")){
                $(this).replaceWith(function () {
                    return $("<label>", {
                        class: this.className,
                        id: this.id,
                    });
                });
            }else{
                $(this).replaceWith(function () {
                    return $("<span>", {
                        class: this.className,
                        id: this.id,
                    });
                });
            }
        });
        $(".tabNull").each(function () {
            if ($(this).is("span")){
                $(this).removeClass(['btn','btn-light'])
            }else{
                $(this).addClass(['btn','btn-light'])
                $file = "Ajouter un fichier <input type='file' name='"+ $(this).attr('id') +"' hidden>";
                $(this).append($file);
            }
        });
    }

    $(".editMode").click(function () {
        $id = $(".nav-link.active").attr('href');
        //console.log($id);
        switch ($id) {
            case "#pills-description":
                //console.log($droit.description);
                if ($droit.description >= 2){
                    $(".editButton").toggle();
                    $(".editZone").toggle();
                    if ($droit.description > 2){
                        convertSpan();
                        convertTr();
                    }
                }
                break;
            case "#pills-identification":
                if ($droit.identification >= 2){
                    $(".editButton").toggle();
                    $(".editZone").toggle();
                    if ($droit.identification > 2){
                        convertSpan();
                        convertTr();
                    }
                }
                break;
            case "#pills-pasteur":
                if ($droit.pasteur >= 2){
                    $(".editButton").toggle();
                    $(".editZone").toggle();
                    if ($droit.pasteur > 2){
                        convertSpan();
                        convertTr();
                    }
                }
                break;
            case "#pills-brevet":
                if ($droit.brevet >= 2){
                    $(".editButton").toggle();
                    $(".editZone").toggle();
                    if ($droit.brevet > 2){
                        convertSpan();
                        convertTr();
                    }
                }
                break;
            case "#pills-publication":
                if ($droit.publication >= 2){
                    $(".editButton").toggle();
                    $(".editZone").toggle();
                    if ($droit.publication > 2){
                        convertSpan();
                        convertTr();
                    }
                }
                break;
            case "#pills-exclisivite":
                if ($droit.exclusivite >= 2){
                    $(".editButton").toggle();
                    $(".editZone").toggle();
                    if ($droit.exclusivite > 2){
                        convertSpan();
                        convertTr();
                    }
                }
                break;
            case "#pills-projet":
                console.log('cc');
                if ($droit.projet >= 2){
                    $(".editButton").toggle();
                    $(".editZone").toggle();
                    if ($droit.projet > 2){
                        convertSpan();
                        convertTr();
                    }
                }
                break;
            case "#pills-eps":
                if ($droit.eps >= 2){
                    $(".editButton").toggle();
                    $(".editZone").toggle();
                    if ($droit.eps > 2){
                        convertSpan();
                        convertTr();
                    }
                }
                break;
            case "#pills-autre":
                if ($droit.autre >= 2){
                    $(".editButton").toggle();
                    $(".editZone").toggle();
                    if ($droit.autre > 2){
                        convertSpan();
                        convertTr();
                    }
                }
                break;
            case "#pills-pha":
                if ($droit.pha >= 2){
                    $(".editButton").toggle();
                    $(".editZone").toggle();
                    if ($droit.pha > 2){
                        convertSpan();
                        convertTr();
                    }
                }
                break;
        }
    });

    $(".nav-link").click(function () {
        $state = 0;
        $(".editZone").each(function () {
            $(this).is(':visible')?$state=1:null;
        });
        if ($state){
            $id = $(".nav-link.active").attr('href');
            //console.log($id);
            switch ($id) {
                case "#pills-description":
                    if ($droit.description >= 2) {
                        $(".editButton").hide();
                        $(".editZone").hide();
                        if ($droit.description > 2) {
                            convertSpan();
                            convertTr();
                        }
                    }
                    break;
                case "#pills-identification":
                    if ($droit.identification >= 2) {
                        $(".editButton").hide();
                        $(".editZone").hide();
                        if ($droit.identification > 2) {
                            convertSpan();
                            convertTr();
                        }
                    }
                    break;
                case "#pills-pasteur":
                    if ($droit.pasteur >= 2) {
                        $(".editButton").hide();
                        $(".editZone").hide();
                        if ($droit.pasteur > 2) {
                            convertSpan();
                            convertTr();
                        }
                    }
                    break;
                case "#pills-brevet":
                    if ($droit.brevet >= 2) {
                        $(".editButton").hide();
                        $(".editZone").hide();
                        if ($droit.brevet > 2) {
                            convertSpan();
                            convertTr();
                        }
                    }
                    break;
                case "#pills-publication":
                    if ($droit.publication >= 2) {
                        $(".editButton").hide();
                        $(".editZone").hide();
                        if ($droit.publication > 2) {
                            convertSpan();
                            convertTr();
                        }
                    }
                    break;
                case "#pills-exclisivite":
                    if ($droit.exclusivite >= 2) {
                        $(".editButton").hide();
                        $(".editZone").hide();
                        if ($droit.exclusivite > 2) {
                            convertSpan();
                            convertTr();
                        }
                    }
                    break;
                case "#pills-projet":
                    if ($droit.projet >= 2) {
                        $(".editButton").hide();
                        $(".editZone").hide();
                        if ($droit.projet > 2) {
                            convertSpan();
                            convertTr();
                        }
                    }
                    break;
                case "#pills-eps":
                    if ($droit.eps >= 2) {
                        $(".editButton").hide();
                        $(".editZone").hide();
                        if ($droit.eps > 2) {
                            convertSpan();
                            convertTr();
                        }
                    }
                    break;
                case "#pills-autre":
                    if ($droit.autre >= 2) {
                        $(".editButton").hide();
                        $(".editZone").hide();
                        if ($droit.autre > 2) {
                            convertSpan();
                            convertTr();
                        }
                    }
                    break;
                case "#pills-pha":
                    if ($droit.pha >= 2) {
                        $(".editButton").hide();
                        $(".editZone").hide();
                        if ($droit.pha > 2) {
                            convertSpan();
                            convertTr();
                        }
                    }
                    break;
            }
            $('.editMode').prop('checked', false);
        }
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            html: true,
            placement: 'bottom',

        })
    });

    $(".tabText .tabDate .tabNum").on('keydown',function () {
        console.log('clic');
        if (!$(this.hasAttribute('oldKey'))) {
            $(this).attr('oldKey', $(this).val());
        }
    });

    $('input').on('keyup',function (){
       if ($(this).parent().parent().hasClass('editZone')){
           $key = $(this).parent().parent().find('input[type=hidden]').prev();
           $isEmpty = -1;
           $(this).parent().parent().find('input').each(function () {
              $(this).val().length!=0?$isEmpty++:
                  $(this).val()!=""?$isEmpty++:null;
           });
           if($isEmpty==0 || $key.val()!=""){
               $key.removeAttr('required');
               $key.removeClass('is-invalid');
           }else{
               $key.attr('required', 'required');
               $key.addClass('is-invalid');
           }
       }
    });

    $('.annulBtn').click(function () {
        window.location.reload()
    })

    //..................................//
    //...........OGM Display............//
    //..................................//



});

