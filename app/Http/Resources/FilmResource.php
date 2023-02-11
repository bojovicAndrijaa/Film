<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\KategorijaResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\ReziserResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->resource->name,
            'duration'=>$this->resource->duration,
            'award'=>$this->resource->award,
            'kategorija'=>new KategorijaResource($this->resource->kategorija),
            'reziser'=>new ReziserResource($this->resource->reziser),
            'user'=>new UserResource($this->resource->user)
        ];
    }
}
