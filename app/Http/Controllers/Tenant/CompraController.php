<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\CarroCompra;
use App\Models\Tenant\Cliente;
use App\Models\Tenant\DetalleVentaProducto;
use App\Models\Tenant\Producto;
use App\Models\Tenant\TiposPago;
use App\Models\Tenant\EstadosPago;
use App\Models\Tenant\EstadosVenta;
use App\Models\Tenant\VentasProducto;
use Illuminate\Support\Facades\Http;

class CompraController extends Controller
{
  public function misCompras()
  {
    $user = auth('cliente')->user()->id;
    $compras = VentasProducto::where('id_cliente', $user)->orderBy('created_at', 'desc')->paginate();
    return view("tenant.pages.ventas.mis-compras", compact('compras'));
  }

  public function obtenerTransacciones(Request $request)
  {
    $idTrans = $request['data']['transaction']['id'];
    $tipPag = TiposPago ::where('descripcion', 'like', '%'.$idTrans.'%')
    ->count();

    if ($tipPag) {

      $tipPag = TiposPago ::where('descripcion', 'like', '%'.$idTrans.'%')
                ->get();
      $ventProd = VentasProducto::where('id_tipo_pago',$tipPag[0]['id'])
                ->get();

      $ventProd = VentasProducto::findOrFail($ventProd[0]["id"]);
      $ventProd->updated_at = $request['sent_at'];
      $ventProd->save();

      $estPag = EstadosPago::where('id',$ventProd->id_estado_pago)
                 ->get();

      $estPag = EstadosPago::findOrFail($estPag[0]["id"]);
      $estPag->descripcion = $request['data']['transaction']['status'];
      $estPag->save();

    }

    // ;



    return response()->json([
        'status' => true,
        'message' => $estPag,
    ], 200);
  }

  public function realizarCompra(Request $request)
  {
    $formasPagos = PlantillaConfigController::obtenerMediosPago();

    $res = [];
    $pse = [];
    foreach ($formasPagos as $formaPago) {
        if ($formaPago->nombre == "wompi") {

            $url ='https://production.wompi.co/v1/';

            $resp = Http::get($url.'merchants/'.$formaPago->cuenta);
            $resp = json_decode($resp->body(),true);
            $res = $resp;

            $resp = Http::withHeaders([
                'Authorization' => 'Bearer '.$formaPago->cuenta,
            ])->get($url.'pse/financial_institutions');
            $resp = json_decode($resp->body(),true);
            $pse = $resp['data'];

        }
    }

    $productos = $request['productos'];
    $esCarroCompras = isset($request['btnCarritoCompras']);
    return view(
      "tenant.pages.ventas.realizar-compra",
      compact(
        'pse',
        'res',
        'formasPagos',
        'productos',
        'esCarroCompras'
      )
    );
  }

  public function ordenar($transac,$productosGuardar)
  {
    $idTipPag = new TiposPago;
    $idTipPag->descripcion = implode('; ',[$transac['data']['id'] , $transac['data']['reference']]);
    $idTipPag->save();

    $idEstPag = new EstadosPago;
    $idEstPag->descripcion = $transac['data']['status'];
    $idEstPag->save();

    $idEstVen = new EstadosVenta;
    $idEstVen->descripcion = "pendiente";
    $idEstVen->save();

    $productos = [];
    $total = 0;
    $venta = VentasProducto::create([
      'id_cliente' => auth('cliente')->user()->id,
      'id_tipo_pago' => $idTipPag->id,
      'id_estado_pago' => $idEstPag->id,
      'id_estado_venta' => $idEstVen->id,
      'telefono' => auth('cliente')->user()->telefono,
      'ciudad' => auth('cliente')->user()->ciudad,
      'direccion' => 0,
      'total' => 0
    ]);

    foreach($productosGuardar as $producto){
      $productoEnviar = Producto::find($producto['id']);
      $productoEnviar->cantidad =$producto['cantidad'];
      array_push($productos, $productoEnviar);

      DetalleVentaProducto::create([
        'id_producto' => $producto['id'],
        'id_venta' => $venta->id,
        'precio' => $producto['precio'],
        'cantidad' => $producto['cantidad']
      ]);
      $total += ($producto['precio'] * $producto['cantidad']);
    }
    $venta->update(['total' => $total]);
    if(count($productosGuardar) > 1){
      CarroCompra::where('id_cliente', auth('cliente')->user()->id)->delete();
    }

    return view("tenant.pages.ventas.orden-realizada", compact('venta', 'productos', 'total'));
  }

  public function compraMedioPago (Request $request)
  {
    $formasPagos = PlantillaConfigController::obtenerMediosPago();
    $pubkey = "";
    $prvkey = "";
    foreach ($formasPagos as $formaPago) {
      if ($formaPago->nombre == "wompi") {
        $pubkey = $formaPago->cuenta;
        $prvkey = $formaPago->logo;
      }
    }

    $url = 'https://production.wompi.co';
    switch ($request['type']) {
      case 'CARD':

        $resp = Http::withHeaders([

          'Authorization'=>'Bearer '.$pubkey,

        ])->post($url.'/v1/tokens/cards',[

          'number' => $request['numCunt'],
          'cvc' => $request['codSeg'],
          'exp_month' => $request['mesExp'],
          'exp_year' =>$request['añoExp'],
          'card_holder' =>$request['numPro'],
        ]);
        $resp = json_decode($resp->body(),true);

        if (array_key_exists('status',$resp)) {
            $datMer = Http::get($url.'/v1/merchants/'.$pubkey);
            $datMer = json_decode($datMer->body(),true);

            $payMet = array(
                "type" => "CARD",
                "installments"=> $request['numCuo'],
                "token"=> $resp['data']['id'] , // Nombre de lo que se está pagando. Máximo 64 caracteres
            );

            $paySour = CompraController::crearMedPago($payMet,$datMer,$pubkey,$prvkey,$url);
            $paySour = json_decode($paySour->body(),true);

            // dd($paySour);
            if (array_key_exists('data',$paySour)) {

                $productos = $request['productos'];
                $productos = json_decode($productos,true);

                CompraController::crearTranssaccionCardNeq($payMet,$datMer,$paySour,$productos,$prvkey,$url);

            }


        }
        else{

          return view("tenant.pages.ventas.orden-rechazada");

        }

        return($paySour);
        break;
      case 'BANCOLOMBIA_TRANSFER':

        $datMer = Http::get($url.'/v1/merchants/'.$pubkey);
        $datMer = json_decode($datMer->body(),true);

        $productos = $request['productos'];
        $productos = json_decode($productos,true);


        $payMet = array(
            "type" => "BANCOLOMBIA_TRANSFER",
            "user_type"=> "PERSON",
            "payment_description"=> $request['traPayDes'] , // Nombre de lo que se está pagando. Máximo 64 caracteres
        );

        return(CompraController::crearTranssaccionBantraPse ($payMet,$datMer,$productos,$prvkey,$url));

       break;
      case 'NEQUI':

        $string = [$request['type']];
        $resp = Http::withHeaders([

          'Authorization'=>'Bearer '.$pubkey,

        ])->post($url.'/v1/tokens/nequi',[

          "phone_number" => $request['neqNum'],

        ]);
        $resp = json_decode($resp->body(),true);

        // dd();

        if (array_key_exists('data',$resp)) {
            $datMer = Http::get($url.'/v1/merchants/'.$pubkey);
            $datMer = json_decode($datMer->body(),true);

            $payMet = array(
                "type" => "NEQUI",
                "phone_number"=> $request['neqNum'],
                "token"=> $resp['data']['id'] , // Nombre de lo que se está pagando. Máximo 64 caracteres
            );

            $paySour = CompraController::crearMedPago($payMet,$datMer,$pubkey,$prvkey,$url);
            $paySour = json_decode($paySour->body(),true);

            if (array_key_exists('data',$paySour)) {

                $productos = $request['productos'];
                $productos = json_decode($productos,true);

                $transac  = CompraController::crearTranssaccionCardNeq($payMet,$datMer,$paySour,$productos,$prvkey,$url);

                dd($transac);

            }


        }else{

          return view("tenant.pages.ventas.orden-realizada", compact('venta', 'productos', 'total'));

        }



        break;
      case 'PSE':
        $datMer = Http::get($url.'/v1/merchants/'.$pubkey);
        $datMer = json_decode($datMer->body(),true);

        $productos = $request['productos'];
        $productos = json_decode($productos,true);

        $payMet = array(
            "type" => "PSE",
            "user_type" => $request['useTye'], // Tipo de persona, natural (0) o jurídica (1)
            "user_legal_id_type" => $request['useLegTye'], // Tipo de documento, CC o NIT
            "user_legal_id" =>  $request['useLeg'], // Número de documento
            "financial_institution_code" => $request['finIns'], // Código (`code`) de la institución financiera
            "payment_description" => $request['psePayDes']
        );

        $transac = CompraController::crearTranssaccionBantraPse ($payMet,$datMer,$productos,$prvkey,$url);



        break;

      default:
        $string = "no tiene metodo";

        return($string);

        break;
      }

  }

  public function crearMedPago ($payMet,$datMer,$pubkey,$prvkey, $url)
  {


    $url = $url.'/v1/payment_sources';

    $paySour = Http::withHeaders([

        'Authorization'=>'Bearer '.$prvkey,

      ])->post($url,[
      "type" => $payMet['type'],
      "token"=> $payMet['token'],
      "acceptance_token" => $datMer['data']['presigned_acceptance']['acceptance_token'],
      "customer_email" => auth('cliente')->user()->correo ,
   ]);


    return($paySour);

  }

  public function generarReferencia()
  {

    $referencia = uniqid();
    $tipPag = TiposPago::where('descripcion',$referencia)
    ->count();

     $referencia = $tipPag ? CompraController::generarReferencia() : $referencia;

    return($referencia);
  }

  public function crearTranssaccionCardNeq ($payMet,$datMer,$paySour,$productos,$prvkey,$url)
  {
        $amontCent = 0;
        foreach ($productos as $producto) {
            $amontCent += ($producto['precio'] * $producto['cantidad']);
        }
        $amontCent = ($amontCent * 100);
        $referencia = CompraController::generarReferencia();

        $url = $url.'/v1/transactions';

        $transac = Http::withHeaders([

        'Authorization'=>'Bearer '.$prvkey,

        ])->post($url,[

            "acceptance_token" => $datMer['data']['presigned_acceptance']['acceptance_token'],
            "amount_in_cents" => $amontCent,
            "currency"=> "COP",
            "customer_email" =>  auth('cliente')->user()->correo,
            "payment_method" => $payMet,
            "payment_source_id" => $paySour ['data']['id'],
            "redirect_url" => "https://mitienda.com.co/pago/resultado",
            "reference" => $referencia,
            "customer_data" => array(
                "phone_number" => auth('cliente')->user()->telefono,
                "full_name" => auth('cliente')->user()->nombre,
            ),

        ]);

        $transac = json_decode($transac->body(),true);

        if (array_key_exists('data',$transac)) {

          return(CompraController::ordenar($transac));

        }else{
            return view("tenant.pages.ventas.orden-rechazada");
        }

  }

  public function crearTranssaccionBantraPse ($payMet,$datMer,$productos,$prvkey,$url)
  {
    $amontCent = 0;
    foreach ($productos as $producto) {
            $amontCent += ($producto['precio'] * $producto['cantidad']);
    }
    $amontCent = ($amontCent * 100);
    $referencia = CompraController::generarReferencia();

    $url = $url.'/v1/transactions';

    $transac =
    Http::withHeaders([

      'Authorization'=>'Bearer '.$prvkey,

    ])->post($url,[
        "acceptance_token" => $datMer['data']['presigned_acceptance']['acceptance_token'],
        "amount_in_cents" => $amontCent,
        "currency"=> "COP",
        "customer_email" =>  auth('cliente')->user()->correo,
        "payment_method" => $payMet,
        "redirect_url" => "http://arture.localhost:8000/realizar-comprar",
        "reference" => $referencia,
        "customer_data" => array(
            "phone_number" => auth('cliente')->user()->telefono,
            "full_name" => auth('cliente')->user()->nombre,
        ),
    ]);

    $transac = json_decode($transac->body(),true);

    if (array_key_exists('data',$transac)) {

        $redireccion = Http::get($url.'/'.$transac['data']['id']);
        $redireccion = json_decode($redireccion->body(),true);

        while (array_key_exists('extra',$redireccion['data']['payment_method']) == false) {
            $redireccion = Http::get($url.'/'.$transac['data']['id']);
            $redireccion = json_decode($redireccion->body(),true);
        }

        return(CompraController::ordenar($transac,$productos)). redirect($redireccion['data']['payment_method']['extra']['async_payment_url']);
    }else{
        return view("tenant.pages.ventas.orden-rechazada");
    }
  }

}
