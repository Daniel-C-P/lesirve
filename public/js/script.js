$('#btnBuscar').on('click', function(){
  const categoria = $('#categoriaBuscar').val();
  const producto = $('#productoBuscar').val();
  const url = `/buscar?categoria=${categoria}&producto=${producto}`;
  location.replace(url);
});