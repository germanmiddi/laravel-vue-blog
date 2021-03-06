<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id'         => $this->id,
            'title'      => $this->title,
            'category_id' => $this->category_id,
            'categoria' => $this->category->title,
            'created_at' => $this->created_at->format('d-m-Y H:i:s')
        ];

    }

}
