<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class ActoMedico extends Model
{
    use HasFactory;

    protected $table = "acto_medico";
    public $timestamps = true;
    protected $fillable = [
        'idcita', 'motivo', 'problema', 'parterial', 'fcardiaca',
        'frespiratoria', 'tbucal', 'taxiliar', 'peso', 'talla', 'icorporal', 'pcefalico', 'examen',
        'fecpro', 'usuario', 'destino'
    ];


    public function registrarActoMedico(Request $request)
    {
        ActoMedico::create([
            'idcita'        => $request['idcita'],
            'motivo'        => $request['motivo'],
            'problema'      => $request['problema'],
            'parterial'     => $request['parterial'],
            'fcardiaca'     => $request['fcardiaca'],
            'frespiratoria' => $request['frespiratoria'],
            'tbucal'        => $request['tbucal'],
            'taxiliar'      => $request['taxiliar'],
            'peso'          => $request['peso'],
            'talla'         => $request['talla'],
            'icorporal'     => $request['icorporal'],
            'pcefalico'     => $request['pcefalico'],
            'destino'       => $request["destino"],
            'examen'        => $request['examen'],
            // 'usuario' => $request['usuario'],
        ]);
    }
}
