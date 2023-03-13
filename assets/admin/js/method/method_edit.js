//GANTI BOBOT
// $(document).ready(function(){
//     $(document).on('click', '#ganti-bobot', function() {
//         var id = $(this).attr('data-bobot');
//         $.ajax({
//             url     : 'edit-bobot',
//             method  : 'GET',
//             data    : { id_bobot : id },
//             success : function(data){
//                 var msg = JSON.parse(data);
//                 if(msg.statusCode==200)
//                 {
//                     Swal.fire('Sukses!', msg.pesan, 'success');
//                 }else{
//                     Swal.fire('Failed!', msg.pesan, 'error');

//                 }
//             },

//             error  : function(data){
//                 Swal.fire('Oops!', 'Something went wrong!', 'error');
//             }

//         })

//     })
// })


//CHANGE BOBOT VALUE ON FIELD
  
$(function(){
    $("#kriteria").change(function(){
       var kode = $('#kriteria').val();
       if(kode!='0'){
         $.ajax({
             url: 'bobot-value',
             method: 'POST',
             data: {id_kriteria : kode },   
             success: function(data) {
               var msg = JSON.parse(data);
                 $('#value').val(msg.bobot);
                 
                 // $('#sub_total').val(subtotal);
            
             }
         });
   
       }else{
         $('#value').val('');
               
       }
      
    })
})