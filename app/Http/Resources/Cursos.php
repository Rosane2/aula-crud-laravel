<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cursos extends JsonResource
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
			  'nomecurso' => $this->nomecurso,
			  'cargahoraria' => $this->cargahoraria,
			  'ativo' => $this->ativo
			];
    }
}
