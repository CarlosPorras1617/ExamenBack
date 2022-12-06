<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Factura extends Model
{
    use HasFactory;
    protected $primaryKey = 'idFactura';
    protected $fillable = [
        'idCliente',
        'Fecha',
        'Numero',
        'IVA'
    ];

public function clientes(){
    return $this->belongsTo(Cliente::class, 'idCliente', 'idCliente');
}

}
