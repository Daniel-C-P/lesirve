var btnWompy = document.getElementById("btnWompy");
var flexSwitchCheck = document.getElementById("flexSwitchCheck");
var alert = document.getElementById("alert");
var textAlert = document.getElementById("textAlert");

var dir = document.getElementById("direccion").value;
var token = document.getElementById("token").value;

flexSwitchCheck.addEventListener("click",activar_desactivar,false);
btnWompy.addEventListener("click",wompi_key_check,false);
window.onload = activar_desactivar();

function activar_desactivar()
{
    if (flexSwitchCheck.checked)
    {
        var wompikey = document.getElementById("wompikey");
        wompikey.disabled = false;
        var wompikeypv = document.getElementById("wompikeypv");
        wompikeypv.disabled = false;
        btnWompy.disabled = false;
    }
    else
    {
        var wompikey = document.getElementById("wompikey");
        wompikey.disabled = true;
        var wompikeypv = document.getElementById("wompikeypv");
        wompikeypv.disabled = true;
        btnWompy.disabled = true;
    }
    var keys =
    {
        chec : flexSwitchCheck.checked ? 'on' : null,
    };
    cargardatos(keys);
}

function wompi_key_check() {
    const url = 'https://production.wompi.co/v1/merchants/';
    var wompikey = document.getElementById("wompikey").value;
    var wompikeypv = document.getElementById("wompikeypv").value;
    var urlcomplete = url + wompikey;
    var res
    if ((wompikey.length  === 0 || wompikeypv.length === 0))
    {
        textAlert.innerHTML= "los campos o un campo se encuentra vacio";
        alert.style.display = "block";
    }
    else
    {
        fetch(urlcomplete)
        .then(response => response.json())
        .then(response =>{
         if (response.hasOwnProperty("data")){
            if (response.data.active) {
                var keys = {
                    pub: wompikey,
                    prv: wompikeypv,
                    chec: flexSwitchCheck.checked ?  'on' : null,
                };
                cargardatos(keys);
            }else{
                textAlert.innerHTML= "tu cuenta no esta activada";
            }
            alert.style.display = "block";
         }else if(response.hasOwnProperty("error")){
            console.log("tu llave es invalida");
            textAlert.innerHTML= "su llave es invalida";
            alert.style.display = "block";
         }
        }
        )
         .catch(err => console.error(err));
    }

}

function cargardatos(keys){
    const options = {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token,
            'Content-Type': 'application/json'
        },
        body:JSON.stringify(keys),
    };
    fetch(dir,options)
        // .then(response => response.json())
        .then(response =>
            {
          textAlert.innerHTML= "su llave es valida";
        //   console.log(response);
        }
        )
         .catch(err => console.error(err));
}

