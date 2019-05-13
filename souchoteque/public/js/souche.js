$(document).ready( function () {
    //..................................//
    //..........Initialisation..........//
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
                                "number" : null
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
                        innerHTML: this.value
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
                    $(this).val() == "Oui" ? $(this).attr("selected", true) : null;
                    $(this).val() == "Non" ? null : $(this).attr("selected", true);
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
            }
            else{
                $(this).addClass("form-control");
            }
        });

        $(".tabFile").each(function () {
            if ($(this).next().is("i")){
                $(this).next().remove();
            }else{
                $fa = "<i class='fas fa-trash'></i>";
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

    $(".editButton").hide();
    $(".editZone").hide();

    $("#editMode").click(function () {
        $(".editButton").toggle();
        $(".editZone").toggle();
        convertSpan();
        convertTr();
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            html: true,
            placement: 'bottom',

        })
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
    });

    $('.tabEps, .tabPha, .tabAutre').each(function () {
       $(this).DataTable({
           "paging":   false,
           "info":     false,
           "language":{
               "search":"Rechercher",
               "emptyTable":"Aucune donnée à afficher",
           },
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
       });
    });

    //..................................//
    //...........Delete entry...........//
    //..................................//
    $("i.deleteCross").click(function () {
        var $link = $(this).prev().attr("href");
        $.post(window.location.pathname + "/suppr", {"file": $link, "_token": $('#_token').val()});
    });


    //..................................//
    //............Edit mode.............//
    //..................................//

    $(".tabText .tabDate .tabNum").on('keydown',function () {
        console.log('clic');
        if (!$(this.hasAttribute('oldKey'))) {
            $(this).attr('oldKey', $(this).val());
        }
    });
    //..................................//
    //...........OGM Display............//
    //..................................//

    //..................................//
    //............Edit mode.............//
    //..................................//

});

