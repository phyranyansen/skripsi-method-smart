//DELETE USER
$(document).ready(function(){
    $(document).on('click', '#delete-user', function() {
      var id = $(this).attr('data-UserDelete');
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
          url     : 'hapus-user',
          method  : 'POST',
          data    : {
              id_login : id
          },
          success: function(data) {
             Swal.fire('Sukses!', 'Data user telah dihapus!', 'success');
             timer_reload();
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