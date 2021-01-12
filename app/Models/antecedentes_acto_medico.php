<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class antecedentes_acto_medico extends Model
{
    use HasFactory;
    protected $table = "antecedentes_acto_medico";
    public $timestamps = false;
    protected $fillable = ['id','idcita', 'an_id', 'an_valor'];
    public function registroAntecedente(Array $request)
    {
        antecedentes_acto_medico::create([
            'idcita'            => $request['idcita'],
            'an_id'             => $request['id'],
            'an_valor'          => $request['valor'],
        ]);
    }
}
