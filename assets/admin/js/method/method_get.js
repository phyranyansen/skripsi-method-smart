//DATATABLE


//GET KONVERSI
$(document).ready(function() {
    setInterval(function() {
        $.ajax({
          url: 'konversi-get',
          method: 'GET',
          success: function(response) {
            $('#data-konversi').html(response);
          }
        });
      }, 1000);

})


//GET BOBOT
$(document).ready(function() {
    setInterval(function() {
        $.ajax({
          url: 'bobot-get',
          method: 'GET',
          success: function(response) {
            $('#data-bobot').html(response);
          }
        });
      }, 1000);

})


//GET BOBOT NORMALISASI
$(document).ready(function() {
    setInterval(function() {
        $.ajax({
          url: 'bobot-normalisasi',
          method: 'GET',
          success: function(response) {
            $('#bobot-normalisasi').html(response);
          }
        });
      }, 1000);

})


//GET UTILITY PROCESS
$(document).ready(function() {
  setInterval(function() {
      $.ajax({
        url: 'utility-get',
        method: 'GET',
        success: function(response) {
          $('#data-utility').html(response);
        }
      });
    }, 1000);

})

//GET UTILITY PROCESS
$(document).ready(function() {
  setInterval(function() {
      $.ajax({
        url: 'result',
        method: 'GET',
        success: function(response) {
          $('#data-result').html(response);
        }
      });
    }, 1000);

})