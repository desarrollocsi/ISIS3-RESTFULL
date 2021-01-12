<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Antecedente extends JsonResource
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
            'id' => $this->id,
            'tipo' => $this->an_destipo,
            'descripcion' => $this->an_descripcion
        ];
        // return parent::toArray($request);
    }
}
