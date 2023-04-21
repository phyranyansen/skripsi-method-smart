//GANTI Kriteria
$(document).ready(function() {
    $(document).on('click', '#edit-detail', function() {
        var id = $(this).attr('data-detail');
        $.ajax({
            url     : 'edit-detail',
            method  : 'POST',
            data    : {
                id_detail : id
            },
            success: function(data) {
               var msg = JSON.parse(data);
               if(msg.statusCode==200)
               {
                  $('#id_detail').val(msg.data.id_detail);
                  $('#kualitatif').val(msg.data.kualitatif);
                  $('#kuantitatif').val(msg.data.kuantitatif);
                  $('#keterangan').val(msg.data.keterangan);
                  console.log(msg.pesan);
               }else{
                Swal.fire('Failed!', msg.pesan, 'error');
               }
            },
            error   : function(data) {
                Swal.fire('Failed!', 'Something went wrong! '+ data, 'error');
            }
    
        })
    })
  
  });
  


  $(document).ready(function() {
      $('#FormDetail-edit').submit(function(e) {
          $.ajax({
              url : "edit-detail",
              type: "POST",
              data: new FormData(this),
              processData: false,
              contentType: false,
              cache: false,
              success : function(data) {
                  var msg = JSON.parse(data);
                  if(msg.statusCode==200)
                  {
                      console.log(msg.pesan);
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
  
