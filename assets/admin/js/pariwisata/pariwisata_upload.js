

$(document).ready(function(){

    $('#wisata-upload').submit(function(e) {
        $.ajax({
            url : "upload-wisata",
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success : function(data) {
                var msg = JSON.parse(data);
                if(msg.statusCode==200)
                {
                    Swal.fire('Sukses!', msg.pesan, 'success');
                    timer_reload();
                }else{
                    Swal.fire('Failed!', msg.pesan, 'error');
                }
            },
            error : function(data) {
                Swal.fire('Failed!', 'Something went wrong!', 'error');
            }
        })
        e.preventDefault();


    });

});