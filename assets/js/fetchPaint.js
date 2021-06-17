/* AJAX Select */

$(document).ready(function(){
    $.ajax({
      type: 'POST',
      url: 'actions/getMark.php'
    })
    .done(function(listas_marcas){
      $('#cbx_marca').html(listas_marcas)
    })
    .fail(function(){
      alert('Hubo un error al cargar las marcas')
    })
  
    $('#cbx_marca').on('change', function(){
      var idM = $('#cbx_marca').val()
      $.ajax({
        type: 'POST',
        url: 'actions/getModel.php',
        data: {'idM': idM}
      })
      .done(function(listas_rep){
        $('#cbx_modelo').html(listas_rep)
      })
      .fail(function(){
        alert('Hubo un error al cargar los modelos')
      })
    })  
 })
