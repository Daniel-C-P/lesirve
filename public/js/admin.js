$('#next-plantilla').on('click', function(){
  const plantilla = $('#plantilla-actual').val();
  const plantillas = ($('#nombres-plantillas').val()).split(';');
  const posPlantilla = plantillas.indexOf(plantilla);

  $('#plantilla-actual').val(
    posPlantilla == (plantillas.length - 1)
      ? plantillas[0]
      : plantillas[posPlantilla + 1]
  );
});
$('#prev-plantilla').on('click', function(){
  const plantilla = $('#plantilla-actual').val();
  const plantillas = ($('#nombres-plantillas').val()).split(';');
  const posPlantilla = plantillas.indexOf(plantilla);

  $('#plantilla-actual').val(
    posPlantilla == 0
      ? plantillas[plantillas.length - 1]
      : plantillas[posPlantilla - 1]
  );
});