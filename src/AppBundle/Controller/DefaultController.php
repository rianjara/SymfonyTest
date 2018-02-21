<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $argsArray = [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'name' => 'matt',
        ];

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', $argsArray);
    }

    public function consumoDetalleAction(Request $request){

        $headers = [
            //'charset' => 'UTF-8'
        ];

        return $this->json('{"success":true,"data":{"valorest":[{"saldo":"$56,95","fechamaxima":"","estado":""}],
        "periods":[{"periodo":"Corte al 15 Enero 2018","valor":"56.95"}],"valor":[{"description":"Total servicios conecel",
        "value":"$50,85","code":"DET-SUB","list":[{"description":"Go trip 2000  megas","value":"$35,00","code":"DET"},
        {"description":"Internet movil 1gb usd5 incl","value":"$5,00","code":"DET"},{"description":"Paq 150 mins incluido usd 7.50",
        "value":"$7,50","code":"DET"},{"description":"Paq 30 mins ldi incluido usd 2","value":"$2,00","code":"DET"},
        {"description":"Paq mensajes escritos ilimitado incl usd 0.5","value":"$0,50","code":"DET"},
        {"description":"Promo megas adicionales","value":"$2,50","code":"DET"},{"description":"Servicios adicionales",
        "value":"$0,85","code":"DET"},{"description":"Subtotal otros servicios","value":"$53,35","code":"DET-SUB"},
        {"description":"Dscto. promo megas adicionales","value":"$-2,50","code":"DET"}]},
        {"description":"Total impuestos","value":"$6,10","code":"DET-SUB","list":[{"description":"I.v.a. por servicios (12%)",
        "value":"$6,10","code":"DET"}]},{"description":"Consumos del mes","value":"$56,95","code":"DET",
        "list":[{"description":"Total consumos del mes","value":"$56,95","code":"DET-VAL"},
        {"description":"Saldo anterior","value":"$25,95","code":"DET"},{"description":"Pagos recibidos","value":"$-25,95","code":"DET"}]}]},
        "data_pago":{"show_button":true,"txt_button":"PAGA AQUI!","tiene_deuda":true,"titulo_pop_up":"Excelente",
        "txt":"Est\u00e1s a un paso de pagar tus valores pendientes",
        "txt_bold":"valores pendientes","deuda":{"fecha":"20180101","total":2.35,"subtotal":2.35,
        "iva":0,"ice":0,"detalle":[{"tipo":"Usuario","descripcion":"993976814","urlicon":"https:\/\/miclaro.com.ec\/imagenes_app\/features\/icon_pay_user.png"},
        {"tipo":"Valor a pagar","descripcion":"$2.35","urlicon":"https:\/\/miclaro.com.ec\/imagenes_app\/features\/icon_pay_money.png"},
        {"tipo":"Periodo de facturaci\u00f3n","descripcion":"20180101","urlicon":"https:\/\/miclaro.com.ec\/imagenes_app\/features\/icon_pay_calendar.png"}]},
        "forma_pago":{"credito_debito":{"tc_opc_text":"Tarjeta de cr\u00e9dito o d\u00e9bito","tc_text":"Tarjetas cr\u00e9dito aceptadas",
        "tc_text_note":"\\u2022 De todos los bancos","tc_imagenes":["https:\/\/miclaro.com.ec\/imagenes_app\/features\/tc_visa.png",
        "https:\/\/miclaro.com.ec\/imagenes_app\/features\/tc_mastercard.png"],"debito_text":"Tarjetas d\u00e9bito aceptadas",
        "debito_imagenes":["https:\/\/miclaro.com.ec\/imagenes_app\/features\/banco_produbanco.png",
        "https:\/\/miclaro.com.ec\/imagenes_app\/features\/banco_pichincha.png","https:\/\/miclaro.com.ec\/imagenes_app\/features\/banco_pacifico.png",
        "https:\/\/miclaro.com.ec\/imagenes_app\/features\/banco_guayaquil.png"]}}},"rating_show":false,"rating_id":"0","rating_title":"",
        "rating_message":"","session_id":"3f5a35fccded8e470a5e905a38f4c0af","s_id":"C_5"}', 200, $headers);
    }
}
