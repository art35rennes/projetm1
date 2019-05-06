$(function(){
    $('#uploadBTN').on('click', function(){
        console.log('click');
        var fd = new FormData($("#fileinfo"));
        //fd.append("CustomField", "This is some extra data");
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/souche/432/update',
            type: 'POST',
            data: fd,
            success:function(data){
                $('#output').html(data);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});