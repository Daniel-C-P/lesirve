var productos = document.getElementById("productos").value;

var clienteid = document.getElementById("cliente[id]").value;

var btnTarCred = document.getElementById("btnTarCred");
var btnTraBan = document.getElementById("btnTraBan");
var btnNeq = document.getElementById("btnNeq");
var btnPse = document.getElementById("btnPse");

btnTarCred.addEventListener("click", datosTarCred ,false);
btnTraBan.addEventListener("click", datosTraBan ,false);
btnNeq.addEventListener("click", datosNeq ,false);
btnPse.addEventListener("click", datosPse ,false);

function datosTarCred (){

    // btnTarCred.disabled = true;
    document.getElementById('type').value = "CARD";
    var numCunt = document.getElementById("numCunt").value;
    var codSeg = document.getElementById("codSeg").value;
    var añoExp = document.getElementById("añoExp").value;
    var mesExp = document.getElementById("mesExp").value;
    var numCuo = document.getElementById("numCuo").value;
    var nomPro = document.getElementById("nomPro").value;

    var datTarCred = {
        "type": "CARD",
        "number": numCunt,
        "cvc": codSeg,
        "exp_month": mesExp,
        "exp_year": añoExp,
        "card_holder": nomPro,
        "installments": numCuo,
        "amount_in_cents": productos,
        "cliente":clienteid,
      };

     tokenTarCred(datTarCred);
}

function datosTraBan (){

    // btnTraBan.disabled = true;
    document.getElementById('type').value = "BANCOLOMBIA_TRANSFER";
    var traPayDes = document.getElementById("traPayDes").value;

    var datTarCred = {
        "type": "BANCOLOMBIA_TRANSFER",
        "payment_description": traPayDes,
        "amount_in_cents": productos,
        "cliente":clienteid,
      };

     tokenTarCred(datTarCred);
}

function datosNeq (){

    // btnNeq.disabled = true;
    document.getElementById('type').value = "NEQUI";
    var neqNum = document.getElementById("neqNum").value;

    var datTarCred = {
        "type": "NEQUI",
        "phone_number": neqNum,
        "amount_in_cents": productos,
        "cliente":clienteid,
      };

     tokenTarCred(datTarCred);
}

function datosPse (){

    // btnPse.disabled = true;
    document.getElementById('type').value = "PSE";
    var useTye = document.getElementById("useTye").value;
    var useLegTye = document.getElementById("useLegTye").value;
    var useLeg = document.getElementById("useLeg").value;
    var finIns = document.getElementById("finIns").value;
    var psePayDes = document.getElementById("psePayDes").value;

    var datTarCred = {
        "type": "PSE",
        "user_type": useTye,
        "user_legal_id_type": useLegTye,
        "user_legal_id": useLeg,
        "financial_institution_code": finIns,
        "payment_description": psePayDes,
        "amount_in_cents": productos,
        "cliente":clienteid,
    };

     tokenTarCred(datTarCred);
}

function tokenTarCred (datosTarCred){

    console.log(datosTarCred);

    var dir = document.getElementById("dir").value;

    var token = document.getElementById("token").value;

    const options = {
        method: 'post',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
        },
         body:JSON.stringify(datosTarCred),
    };
    console.log(options);

    fetch(dir,options)
        .then(response => response.json())
        .then(response =>{
         console.log(response);
        }
        )
         .catch(err => console.error(err));

}
