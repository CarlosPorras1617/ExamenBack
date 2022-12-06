<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'Nombre' => 'required|string',
            'Ape1' => 'required|string'
        ]);

        $cliente = Cliente::where('Nombre', $data['Nombre'])
        ->where('Ape1', $data['Ape1'])
        ->first();

        if(!$cliente) {
            return response([
                'message'=>'Error, no se encontra registrado'
            ],404);
        }

        $token = $cliente->createToken('app-token')->plainTextToken;

        return response ([
            'messager'=> 'Credenciales correctas',
            'user' => $cliente,
            'token' => $token
        ]);
    }
}
