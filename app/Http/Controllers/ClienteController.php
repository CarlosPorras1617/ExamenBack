<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClienteController extends Controller
{

    public function index()
    {
        $cliente = Cliente::with(['facturas'])->get();
        return $cliente;
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->validateRequest());

            $cliente = Cliente::create($data);

            return response([
                'message'=> 'Se creo con exito el cliente',
                'idCliente' => $cliente['idCliente']
            ], 201);
    }

    public function show($idCliente)
    {
        $cliente= Cliente::find($idCliente);
        $error404="Cliente no encontrado, error: 404";
        if($cliente!=null){
            return response($cliente,200);
        }else{
            return response($error404,404);
        }

    }

    public function update(Request $request, $idCliente)
    {
        $cliente = Cliente::find($idCliente);
        if(!$cliente){
            return response([
                'message'=>'Cliente no encontrado'
            ],404);
        }

        $data = $request->validate($this->validateRequest());

        $cliente->update($data);

        return response([
            'message'=>'Se modifico el cliente'
        ]);
    }

    public function destroy($idCliente)
    {
        $cliente = Cliente::find($idCliente);
        if(!$cliente){
            return response([
                'message'=>'No encontrado'
            ],404);
        };

        $cliente->delete();

        return response([
            'message'=>'Cliente Eliminado'
        ]);
    }

    private function validateRequest(){
        return[
            'Nombre'=>'required|string|min:3|max:50',
            'Ape1'=>'required|string|min:3|max:50',
            'Ape2'=>'required|string|min:3|max:50'
        ];
    }
}
