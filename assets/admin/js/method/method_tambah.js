
//INSERT
$(document).ready(function() {
    $('#add-wisata').submit(function(e) {
        $.ajax({
            url : "tambah-konversi",
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
                }else{
                    Swal.fire('Failed!', msg.pesan, 'error');
                }
            },
            error : function(data) {
                Swal.fire('Failed!', 'Something went wrong!', 'error');
            }
        })
        e.preventDefault();
    })

});
