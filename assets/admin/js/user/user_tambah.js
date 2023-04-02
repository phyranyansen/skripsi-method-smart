//ADD USER
$(document).ready(function(){
    $('#formUser-Add').submit(function(){
        var password     = $('#password_add').val();
        var passwordConf = $('#passwordConf_add').val();
        if(password != passwordConf)
        {
            var info = '<small class="text-danger">Konfirmasi password tidak cocok!</small>';
            $('#alert-add').html(info);
        }else{
            $.ajax({
                url  : 'tambah-user',
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

        }

    })
})


//VISIBLE N UNVISIBLE PASSWORD
var passwordField = document.getElementById("password_add");
var toggleButton = document.getElementById("toggle-password-add");

toggleButton.addEventListener("click", function(){
  if (passwordField.type === "password") {
    passwordField.type = "text";
    toggleButton.innerHTML = '<i class="mdi mdi-eye-off"></i>';
  } else {
    passwordField.type = "password";
    toggleButton.innerHTML = '<i class="mdi mdi-eye"></i>';
  }
});