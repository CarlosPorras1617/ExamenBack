<?php

namespace App\Models;

use App\Models\Factura;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasApiTokens, HasFactory;
    protected $primaryKey = 'idCliente';
    protected $fillable = [
        'Nombre',
        'Ape1',
        'Ape2'
    ];


    public function facturas(){
        return $this->hasMany(Factura::class,'idCliente','idCliente');
    }
}
