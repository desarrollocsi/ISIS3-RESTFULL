<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use App\Http\Resources\Antecedente as AntecedenteResources;

class Antecedente extends Model
{
    use HasFactory;
    protected $table = 'antecedentes';

    public function listado()
    {
        $data = Antecedente::all(['id','an_destipo', 'an_codigo', 'an_descripcion']);
        return AntecedenteResources::collection($data);
    }
}
