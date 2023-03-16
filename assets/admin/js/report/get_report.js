//GET TABLE WISATA
$(document).ready(function() {
    setInterval(function() {
        $.ajax({
          url: 'rp-wisata',
          method: 'GET',
          success: function(response) {
            $('#alternatif').html(response);
          }
        });
      }, 1000);

})

//GET TABLE KONVERSI
$(document).ready(function() {
    setInterval(function() {
        $.ajax({
          url: 'rp-konversi',
          method: 'GET',
          success: function(response) {
            $('#konversi').html(response);
          }
        });
      }, 1000);

})

//GET BOBOT
$(document).ready(function() {
    setInterval(function() {
        $.ajax({
          url: 'rp-bobot',
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
          url: 'rp-normalisasi',
          method: 'GET',
          success: function(response) {
            $('#data-normalisasi').html(response);
          }
        });
      }, 1000);

})

//GET UTILITY PROCESS
$(document).ready(function() {
    setInterval(function() {
        $.ajax({
          url: 'rp-utility',
          method: 'GET',
          success: function(response) {
            $('#data-utility').html(response);
          }
        });
      }, 1000);
  
  })

//GET RESULT
$(document).ready(function() {
    setInterval(function() {
        $.ajax({
          url: 'rp-result',
          method: 'GET',
          success: function(response) {
            $('#data-result').html(response);
          }
        });
      }, 1000);
  
  })