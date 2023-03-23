//GANTI BOBOT
$(document).ready(function() {
    $(document).on('click', '#edit-wisata', function() {
        var id = $(this).attr('data-WisataEdit');
        $.ajax({
            url     : 'edit-wisata',
            method  : 'POST',
            data    : {
                id_wisata : id
            },
            success: function(data) {
               var msg = JSON.parse(data);
               if(msg.statusCode==200)
               {
                  $('#nama_pariwisata').val(msg.data.nama);
                  $('#id_wisata').val(msg.data.id_wisata);
                  $('#jarak').val(msg.data.jarak);
                  $('#random').val(msg.data.random);
                  $('#tiket_masuk').val(msg.data.harga);
                  $('#jam_operasional').val(msg.data.jam);
                  $('#aksebility').val(msg.data.akses);
                  $('#fasilitas').val(msg.data.fasilitas);
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
              url : "edit-wisata",
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
  
