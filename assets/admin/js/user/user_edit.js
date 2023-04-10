//Edit UserCode
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
      var dataId = $(this).attr('dataId');
      var menu   = $(this).attr('id');
      var value  = ($(this).is(":checked") ? 1 : 0);

      console.log('Id Login: ' + dataId + ', Menu: ' + menu + ', Status: ' + value );

        $.ajax({
          type: 'POST',
          url: 'edit-access',
          data: {
            id_login: dataId,
            status  : value,
            menu    : menu
          },
          success: function(response){
            var msg = JSON.parse(response);
            if(msg.statusCode==200)
            {
                   console.log(msg.menu);
                   console.log(msg.status);
                   console.log(msg.user);
                   Swal.fire('Sukses!', msg.pesan, 'success');
               }else{
                Swal.fire('Failed!', msg.pesan, 'error');
               }
          },
          error: function(xhr, status, error){
            console.log('Terjadi kesalahan saat menyimpan data: ' + error);
          }
        });
      
   
    });
  });

//EDIT USER
$(document).ready(function() {
    $(document).on('click', '#edit-user', function() {
        var id = $(this).attr('data-UserEdit');
        // console.log(id);

        $.ajax({
            url     : 'edit-user',
            method  : 'POST',
            data    : {
                id_login : id
            },
            success: function(data) {
               var msg = JSON.parse(data);
               console.log(msg);
               if(msg.statusCode==200)
               {
                  $('#id_login').val(msg.data.id_login);
                  $('#username').val(msg.data.username);
                  $('#activated').val(msg.data.activated);
                  $('#status').val(msg.data.status);
                  console.log(msg.data.id_login);
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

//GANTI USER  
$(document).ready(function(){
    $('#formUser-Edit').submit(function(){
        $.ajax({
            url  : 'edit-user',
            type : 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success : function(response){
                var msg = JSON.parse(response);
                if(msg.statusCode==200)
                {
                    Swal.fire('Sukses!', msg.pesan, 'success');
                     timer_reload();
                }else{
                    Swal.fire('Failed!', msg.pesan, 'error');
                }
            },
            
            error   : function(response){
                console.log(response);
                Swal.fire('Failed!', 'Something went wrong!', 'error');
            }

        })
    })


})  



//VISIBLE N UNVISIBLE PASSWORD
  var passwordField = document.getElementById("password");
  var toggleButton = document.getElementById("toggle-password");
  
  toggleButton.addEventListener("click", function(){
    if (passwordField.type === "password") {
      passwordField.type = "text";
      toggleButton.innerHTML = '<i class="mdi mdi-eye-off"></i>';
    } else {
      passwordField.type = "password";
      toggleButton.innerHTML = '<i class="mdi mdi-eye"></i>';
    }
  });


//DISABLED FUNGSI TEXTFIELD PASSWORD
$(document).ready(function() {
        const checkbox = $('#old');
        const passwordInput = $('#password');
        const passwordConfInput = $('#passwordConf');

        checkbox.on('change', function() {
          if ($(this).prop('checked')) {
            passwordInput.prop('disabled', false);
            passwordConfInput.prop('disabled', false);
        } else {
            passwordInput.prop('disabled', true);
            passwordConfInput.prop('disabled', true);
          }
        });
      });