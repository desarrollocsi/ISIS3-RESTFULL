<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Diagnostico_Acto_Medico extends Model
{
    use HasFactory;
    protected $table = "diagnostico_acto_medico";
    public $timestamps = true;
    protected $fillable = ['id','idcita', 'idcie','tdx'];

    public function registroDiagnosticoMedico(Array $request)
    {
        Diagnostico_Acto_Medico::create([
            'idcita'            => $request['idcita'],
            'idcie'             => $request['idcie'],
            'tdx'               => $request['tdx'],
        ]);
    }
}
