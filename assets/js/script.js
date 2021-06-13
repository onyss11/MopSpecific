/* Animation Scroll */

window.addEventListener("scroll", function(){
    const header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})


/* Animation burguer */ 

const iconMenu = document.getElementById('iconMenu');
const main_Nav = document.getElementById("navMain");

iconMenu.onclick = function(){
    iconMenu.classList.toggle('active');
    main_Nav.classList.toggle('active');
}

/* Search Form */
/*
$(document).ready(function(){
    $.ajax({
      type: 'POST',
      url: 'actions/getMark.php'
    })
    .done(function(listas_marcas){
      $('#cbx_marca').html(listas_marcas)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las marcas')
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
        alert('Hubo un errror al cargar los modelos')
      })
    })  
 })*/

