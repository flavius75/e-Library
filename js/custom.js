$(document).ready(function(){
  $('.parallax').parallax();


  $('#searchbar').keyup(function(){
    var recherche = $(this).val();
    var data= 'keyword=' + recherche;

    if (recherche.length>3){
      $.ajax({
        type:'GET',
        url:'php/search.php',
        data: data,

        success:function(server_response){
            $('#results').html(server_response).show();
        }
    })

      $('#results').show();
  }else{
    $('#results').hide();
  }
  });
});
