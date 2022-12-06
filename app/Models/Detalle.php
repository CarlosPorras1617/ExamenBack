<?php

namespace App\Models;

use App\Models\Factura;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detalle extends Model
{
    use HasFactory;
    protected $primaryKey = 'idDetalle';
    protected $fillable = [
        'Cantidad',
        'Descripcion',
        'Precio',
        'idFactura'

    ];

public function facturas(){
    return $this->belongsTo(Factura::class, 'idFactura', 'idFactura');
}

}
