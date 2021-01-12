<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use App\Http\Resources\Cie10 as Cie10Resource;

class Cie10 extends Model
{
    // use HasFactory;

    protected $table = "cie10";
    protected $primaryKey = "orden";

    public function diagnostico()
    {
        return Cie10::orderby('orden')->get(['codigo', 'descripcion']);
    }

    public function filtroDiagnostico(Request $request)
    {
        $data = Cie10::where('descripcion', 'like', '%' . $request->search . '%')
            ->orWhere('codigo', 'like', '%' . $request->search . '%')
            ->get(['orden','codigo', 'descripcion']);
        // return $data;
        return Cie10Resource::collection($data);
    }
}
