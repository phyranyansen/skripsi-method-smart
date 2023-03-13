
//DELETE
$(document).ready(function(){
      $(document).on('click', '#delete-wisata', function() {
        var id = $(this).attr('data-WisataDelete');
        // alert(id);
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary m-2',
                cancelButton: 'btn btn-warning m-2'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Anda yakin ingin menghapus?',
            text: "Data akan dihapus secara permanent!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus !',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

        $.ajax({
            url     : 'hapus-wisata',
            method  : 'POST',
            data    : {
                id_wisata : id
            },
            success: function(data) {
               var msg = JSON.parse(data);
               if(msg.statusCode==200)
               {
                Swal.fire('Sukses!', msg.pesan, 'success');
                timer_reload();
               }else{
                Swal.fire('Failed!', msg.pesan, 'error');
               }
            },
            error   : function(data) {
                Swal.fire('Failed!', 'Something went wrong! '+ data, 'error');
            }
    
        });
            
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled!',
                'Your imaginary file is safe :)',
                'error'
            )
        }

        });
    });

});

function timer_reload() {
    setTimeout(function() {
        window.location.href =
            "pariwisata";
     
    }, 1700);
}