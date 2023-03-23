//GET BOBOT
$(document).ready(function() {
    setInterval(function() {
        $.ajax({
          url: 'bobot-view',
          method: 'GET',
          success: function(response) {
            $('#data-list').html(response);
          }
        });
      }, 1000);

})