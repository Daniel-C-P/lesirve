<?php

$e = 0;
foreach ($res['data']['accepted_payment_methods'] as $re) {
    $e++;
}

?>

<div class="accordion" id="acordeonPagos1">

    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <input type="hidden" id="dir" value="{{ route('tenant.form.compra.medio') }}">
    <input type="hidden" id="dir" name="type" value="CARD">

    @foreach ($formasPago as $formaPago)
        <div class="accordion-item">
            <h2 class="accordion-header" id="formaPago{{ $formaPago->nombre }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#formaPago{{ $formaPago->id }}" aria-expanded="true" aria-controls="collapseOne">
                    {{ $formaPago->nombre }}
                </button>
            </h2>
            <div id="formaPago{{ $formaPago->id }}" class="accordion-collapse collapse"
                aria-labelledby="formaPago{{ $formaPago->nombre }}" data-bs-parent="#acordeonPagos">
                <div class="accordion-body">
                    @if ($formaPago->cuenta != null)
                        <div class="accordion accordion-flush" id="accordionFlushExample">

                            @for ($i = 0; $i < $e; $i++)
                                @if ($res['data']['accepted_payment_methods'][$i] == 'BANCOLOMBIA_TRANSFER')
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                Boton de Transfereancia Bancolombia
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">

                                                <input type="text" id="traPayDes" name="traPayDes" class="form-control"
                                                    placeholder="Descripcion de la transsaccion"><br>
                                                <button type="submit" id="btnTraBan"
                                                    class="btn btn-primary">pagar</button>

                                            </div>
                                        </div>
                                    </div>
                                @elseif ($res['data']['accepted_payment_methods'][$i] == 'NEQUI')
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                                Nequi
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">


                                                <input type="text" id="neqNum" name="neqNum" class="form-control"
                                                    placeholder="Numero de telefono" minlength="10" maxlength="10"
                                                    onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"><br>
                                                <button type="submit" id="btnNeq"
                                                    class="btn btn-primary">pagar</button>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($res['data']['accepted_payment_methods'][$i] == 'PSE')
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                                aria-expanded="false" aria-controls="flush-collapseFour">
                                                PSE
                                            </button>
                                        </h2>
                                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <select class="form-select" aria-label="Default select example"
                                                    id="useTye" name="useTye">
                                                    <option value="0">NATURAL</option>
                                                    <option value="1">JURIDICA</option>
                                                </select><br>
                                                <div class="input-group mb-3">
                                                    <select class="form-select" aria-label="Default select example"
                                                        id="useLegTye" name="useLegTye">
                                                        <option value="CC">CC</option>
                                                        <option value="NIT">NIT</option>
                                                    </select>
                                                    <input type="text" class="form-control" id="useLeg" name="useLeg"
                                                        aria-label="Text input with dropdown button" minlength="10"
                                                        placeholder="Numero doc"
                                                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                                </div>

                                                <select class="form-select" aria-label="Default select example"
                                                    id="useTye" name="useTye">
                                                    @foreach ($pse as $key )
                                                    <option value="{{$key['financial_institution_code']}}">
                                                        {{$key['financial_institution_name']}}
                                                    </option>
                                                    @endforeach

                                                </select><br>

                                                <input type="text" name="psePayDes" id="psePayDes"
                                                    class="form-control" placeholder="descipcion del pago"
                                                    maxlength="30"><br>
                                                <button type="submit" id="btnPse"
                                                    class="btn btn-primary">pagar</button>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($res['data']['accepted_payment_methods'][$i] == 'CARD')
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                aria-expanded="false" aria-controls="flush-collapseThree">
                                                Tarjeta de Credito
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingThree"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="mb-3">
                                                    <input type="hidden" id="type" name="type">

                                                    <input type="text" id="numCunt" name="numCunt"
                                                        class="form-control" placeholder="Numero de la tarjeta"
                                                        maxlength="16"
                                                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"><br>
                                                    <input type="text" id="codSeg" name="codSeg"
                                                        class="form-control" placeholder="Codigo de Seguridad"
                                                        maxlength="3"
                                                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"><br>
                                                    <input type="number" id="mesExp" name="mesExp"
                                                        class="form-control" placeholder="Mes de expiracion"
                                                        min="1" max="12" maxlength="2"
                                                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"><br>
                                                    <input type="text" id="añoExp" name="añoExp"
                                                        class="form-control" placeholder="Año de expiracion"
                                                        maxlength="2"
                                                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"><br>
                                                    <input type="text" id="nomPro" name="numPro"
                                                        class="form-control" placeholder="Nombre del propietario"
                                                        min="1" max="36" > <br>
                                                    <input type="number" id="numCuo" name="numCuo"
                                                        class="form-control" placeholder="Numero de cuantos"
                                                        min="1" max="36" ><br>


                                                    <button type="submit" id="btnTarCred"
                                                        class="btn btn-primary">pagar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            @endfor
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
