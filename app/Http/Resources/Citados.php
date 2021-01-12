<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Citados extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->ci_idcita,
            'orden' => $this->ci_orden,
            'historia' => $this->ci_numhist,            
            'hora' => $this->ci_horatencion,
            'paciente' => $this->nombrecompleto,
            'edad' => $this->calculaedad,
            'medico' => $this->medico->me_nombres,
            'especialidad' => $this->especialidad->es_descripcion,
            'estado' => $this->ci_estado,
        ];
        // return parent::toArray($request); // Default
    }
}
