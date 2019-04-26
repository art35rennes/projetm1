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
                $oui = "<option>Oui</option>";
                $non = "<option>Non</option>";
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
    })

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

    //..................................//
    //...........OGM Display............//
    //..................................//

    //..................................//
    //............Edit mode.............//
    //..................................//

    function submitMaj() {
        $("#majForm").submit();
    }

    $('.fa-pen').click(function () {
        if ($(this).parent().is('td')) {
            var $data = $(this).parent();
            var $lastrow = $(this).parent().parent().next();

            while ($lastrow[0].className != "editZone") {
                $lastrow = $lastrow.next();
            }
            var $lastdata = $lastrow.children(":last-child");

            while ($data.is('td')) {
                var $value = $data.children(":first-child");

                if ($value.is("a")) {
                    //console.log('a');
                } else {
                    if ($value.is("p")) {
                        //console.log("p "+$value.text());
                        $data.empty();
                        $data.append($lastdata.children().clone());
                        $data.children().children("input").val($value.text());

                        if ($data.children().children("input").attr("isKey")) {
                            $data.children().children("input").attr("readonly", true)
                        }


                        /*$split = $data.children().children("input").attr("name").split("/",2);
                        console.log($split.length)
                        $name = ([$split[0],$data.parent().index(),$split[1]]).join("/");*/

                        $name = $data.children().children("input").attr("name").replace("/0/", "/" + $data.parent().index() + "/");
                        $data.children().children("input").attr("name", $name);
                        //console.log($data.children().children("input"));
                    } else {
                        if ($value.is("i")) {
                            //console.log("i");
                            $value.toggle();
                            $value.next().toggle()
                        } else {
                            if (!$($value).is(':parent')) {
                                //console.log('vide')
                                $data.empty()
                                $data.append($lastdata.children().clone());
                                if ($data.children().children().children().attr("isKey")) {
                                    $data.children().children().children().attr("readonly", true)
                                }
                                //$data.children().children().children().attr("name",$data.children().children().children().attr("name")+"/"+$data.parent().index());
                                $name = $data.children().children().children().attr("name").replace("/0/", "/" + $data.parent().index() + "/");
                                $data.children().children().children().attr("name", $name);
                            }
                        }
                    }
                }
                $data = $data.prev();
                $lastdata = $lastdata.prev();
            }
        }
    });

    $(".checkPostRow").hide();
    $(".checkPostRow").click(function () {
        submitMaj();
    });
    $('.faForm').click(function () {
        submitMaj();
    });
});

