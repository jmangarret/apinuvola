<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ViajesResource extends JsonResource
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
            'type' => 'viajes',
            'id'=> $this->resource->getRouteKey(),
            'attributes' => [
                'fecha' => $this->resource->fecha,
                'pais' => $this->resource->pais,
                'ciudad' => $this->resource->ciudad,
                'email' => $this->resource->email,
            ]
        ];
    }
}
