//GANTI Kriteria
$(document).ready(function() {
    $(document).on('click', '#edit-kriteria', function() {
        var id = $(this).attr('data-KriteriaEdit');
        $.ajax({
            url     : 'edit-kriteria',
            method  : 'POST',
            data    : {
                id_kriteria : id
            },
            success: function(data) {
               var msg = JSON.parse(data);
               if(msg.statusCode==200)
               {
                  $('#nama_kriteria').val(msg.data.nama);
                  $('#id_kriteria').val(msg.data.id_kriteria);
                  $('#atribut').val(msg.data.atribut);
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
      $('#formEdit').submit(function(e) {
          $.ajax({
              url : "edit-kriteria",
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
  
