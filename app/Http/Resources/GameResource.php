<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed short_name
 * @property mixed image
 * @property mixed slot_per_month
 * @property mixed description
 */
class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'short_name' => $this->short_name,
            'image' => $this->image->path,
            'slot_per_month' => $this->slot_per_month,
            'description' => $this->description
        ];
    }
}
