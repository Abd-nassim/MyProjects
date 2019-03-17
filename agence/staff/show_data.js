
$(document).ready(function(){
show_data(2000);

  function show_data(){
    $.post('table_clients.php',function(data) {
      $('.afficher').html(data);
    });
  }



});
