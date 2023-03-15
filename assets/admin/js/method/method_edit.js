//GANTI BOBOT
$(document).ready(function() {
  $('#edit-bobot').submit(function(e) {
      $.ajax({
          url : "bobot-edit",
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


//CHANGE BOBOT VALUE ON FIELD
$(function(){
    $("#kriteria").change(function(){
       var kode = this.value;
       if(kode!='0'){
         $.ajax({
             url: 'bobot-value',
             method: 'POST',
             data: {id_kriteria : kode },   
             success: function(data) {
               var msg = JSON.parse(data);
                 $('#value').val(msg.bobot);
            
             }
         });
   
       }else{
         $('#value').val('');
               
       }
      
    })
})