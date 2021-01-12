<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MenuResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $result =  [
            'title' =>  $this->nombre,
            'icon'  =>  $this->icono,
            'link'  =>  $this->accion,
        //     'children' =>MenuResource::collection($this->children),
        ];
        $child = MenuResource::collection($this->children);
        if (!$child->isEmpty()) {
            $result['children'] = $child;
        }
        return $result;
        //return parent::toArray($request);
    }
}
