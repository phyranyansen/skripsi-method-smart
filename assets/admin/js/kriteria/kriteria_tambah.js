
//ADD Kriteria
$(document).ready(function() {
    $('#FormKriteria-add').submit(function(e) {
        $.ajax({
            url : "tambah-kriteria",
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
    })

});


//ADD Kriteria Detail
$(document).ready(function() {
    $('#FormDetail-add').submit(function(e) {
        $.ajax({
            url : "tambah-detail",
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
    })

});