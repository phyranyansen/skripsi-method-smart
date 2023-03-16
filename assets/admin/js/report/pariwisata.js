

//GET REPORT PARIWISATA
$(document).ready(function() {
    $('#report-params').submit(function(e) {
        $('#RP-WST').modal('hide');
        $.ajax({
            url : "laporan-pariwisata",
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success : function(data) {
                showloading_data();
            },
            error : function(data) {
                Swal.fire('Failed!', 'Something went wrong!', 'error');
            }
        })
        e.preventDefault();
    })
  
  });


    function showloading_data()
    {
        let timerInterval
        Swal.fire({
        title: 'Loading...',
        html: 'Harap tunggu!',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval);
            $('#RP-WST').modal('hide');
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
        })
    }
    
