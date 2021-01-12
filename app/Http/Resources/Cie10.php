<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cie10 extends JsonResource
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
            'id' => $this->orden,
            'cie' => $this->codigo,
            'descripcion' => $this->descripcion
        ];
        // return parent::toArray($request);
    }
}
