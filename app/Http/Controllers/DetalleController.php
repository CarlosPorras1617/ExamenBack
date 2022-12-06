<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalle = Detalle::with(['facturas:idFactura,idCliente,Fecha,Numero,IVA'])->get();
        return $detalle;
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->validateRequest());

            $detalle = Detalle::create($data);

            return response([
                'message'=> 'Se creo con exito el detalle',
                'idDetalle' => $detalle['idDetalle']
            ], 201);
    }

    public function show($idDetalle)
    {
        $detalle= Detalle::find($idDetalle);
        $error404="Detalle no encontrado, error: 404";
        if($detalle!=null){
            return response($detalle,200);
        }else{
            return response($error404,404);
        }
    }


    public function update(Request $request, $idDetalle)
    {
        $detalle = Detalle::find($idDetalle);
        if(!$detalle){
            return response([
                'message'=>'Detalle no encontrado'
            ],404);
        }

        $data = $request->validate($this->validateRequestUpdate());

        $detalle->update($data);

        return response([
            'message'=>'Se modifico el detalle'
        ]);
    }

    public function destroy($idDetalle)
    {
        $detalle = Detalle::find($idDetalle);
        if(!$detalle){
            return response([
                'message'=>'No encontrado'
            ],404);
        };

        $detalle->delete();

        return response([
            'message'=>'Detalle Eliminado'
        ]);
    }

    private function validateRequest(){
        return[
            'Cantidad'=>'required|numeric',
            'Descripcion'=>'required|string|max:250',
            'Precio'=>'required|string',
            'idFactura'=>'required|exists:facturas,idFactura'
        ];
    }

    private function validateRequestUpdate(){
        return[
            'Descripcion'=>'required|string|max:250',
            'Precio'=>'required|string',
        ];
    }
}
