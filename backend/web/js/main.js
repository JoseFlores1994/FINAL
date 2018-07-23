$(function() {

 //Obtiene el click del boton de crear categorias
  $('#modalButton').click(function() {
     $('#modal').modal('show')
          .find('#modalContent')
          .load($(this).attr('value'));
  });

});
