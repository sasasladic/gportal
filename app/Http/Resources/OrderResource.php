<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed server
 * @property mixed order_status
 * @property mixed price
 * @property mixed created_at
 */
class OrderResource extends JsonResource
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
//            'order_no' => $this->order_no,
//            'user_id',
            'server' => new ServerResource($this->server),
            'status' => [
                'id' => $this->order_status->id,
                'name' => $this->order_status->name
            ],
            'price' => $this->price,
            'date'  => $this->created_at
        ];
    }
}
