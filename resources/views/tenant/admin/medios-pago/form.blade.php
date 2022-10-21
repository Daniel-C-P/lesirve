  <div id="alert" class="alert alert-warning alert-dismissible fade show" role="alert" style="display: none">
    <p id="textAlert"></p>
  </div>

  <input type="hidden" id="direccion" value="{{route('medios-pagos.update')}}">
  <input type="hidden" id="token" value="{{csrf_token()}}">


    <div class="form-group">

        <div class="form-check form-switch">
            @if (count($mediosPagos) == 0)
            <input class="form-check-input" type="checkbox" id="flexSwitchCheck" name="chec">
            @else
              @if ($mediosPagos[0]['habilitado'] == 1)
              <input class="form-check-input" type="checkbox" id="flexSwitchCheck" name="chec" checked>
              @else
              <input class="form-check-input" type="checkbox" id="flexSwitchCheck" name="chec" >
              @endif
            @endif
            <label class="form-check-label" for="flexSwitchCheckDefault">Medios de Pago</label><br>
        </div>

      <label for="exampleInputEmail1">WOMPI</label>
      @if (count($mediosPagos) == 0)
      <input type="text" class="form-control" id="wompikey" name="wompikey" aria-describedby="emailHelp" placeholder="inserte su llave publica"> <br>
      <input type="text" class="form-control" id="wompikeypv" name="wompikeypv" aria-describedby="emailHelp" placeholder="inserte su llave prv">

      @else
      <input type="text" class="form-control" id="wompikey" name="wompikey" aria-describedby="emailHelp" placeholder="inserte su llave publica" value="{{$mediosPagos[0]['cuenta']}}"> <br>
      <input type="text" class="form-control" id="wompikeypv" name="wompikeypv" aria-describedby="emailHelp" placeholder="inserte su llave privada" value="{{$mediosPagos[0]['logo']}}"><br>
      @endif
      <p>copie el siguinete link y coloquelo en la seccion url eventos</p>
      <input type="text" readonly class="form-control"  readonly id="urlEventos" aria-describedby="emailHelp" placeholder="inserte su llave privada" value="{{route('tenant.compras.transacciones')}}">

      <small id="emailHelp" class="form-text text-muted"> Dirijase para su cuenta de  wompi y copie su llave publica</small>
    </div>
    <button type="submit" class="btn btn-primary" id="btnWompy"> comprobar llave </button>

