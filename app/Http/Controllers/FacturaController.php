<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        $factura = Factura::with(['clientes:idCliente,Ape1,Ape2'])->get();
        return $factura;
    }


    public function store(Request $request)
    {
        $data = $request->validate($this->validateRequest());

            $factura = Factura::create($data);

            return response([
                'message'=> 'Se creo con exito el cliente',
                'idFactura' => $factura['idFactura']
            ], 201);
    }

    public function show($idFactura)
    {
        $factura= Factura::find($idFactura);
        $error404="Factura no encontrada, error: 404";
        if($factura!=null){
            return response($factura,200);
        }else{
            return response($error404,404);
        }
    }

    public function update(Request $request, $idFactura)
    {
        $factura = Factura::find($idFactura);
        if(!$factura){
            return response([
                'message'=>'Factura no encontrado'
            ],404);
        }

        $data = $request->validate($this->validateRequest());

        $factura->update($data);

        return response([
            'message'=>'Se modifico la factura'
        ]);
    }

    public function destroy($idFactura)
    {
        $factura = Factura::find($idFactura);
        if(!$factura){
            return response([
                'message'=>'No encontrado'
            ],404);
        };

        $factura->delete();

        return response([
            'message'=>'Factura Eliminada'
        ]);
    }

    private function validateRequest(){
        return[
            'idCliente'=>'required|exists:clientes,idCliente',
            'Fecha'=>'required|date',
            'Numero'=>'required|numeric',
            'IVA'=>'required|numeric'
        ];
    }
}
