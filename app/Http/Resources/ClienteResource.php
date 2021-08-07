<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
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
            'type' => 'clientes',
            'id'=> $this->resource->getRouteKey(),
            'attributes' => [
                'nombre' => $this->resource->nombre,
                'apellidos' => $this->resource->apellidos,
                'telefono' => $this->resource->telefono,
                'email' => $this->resource->email,
                'direccion' => $this->resource->direccion,
                'foto' => $this->resource->foto,
            ]
        ];
    }
}
