<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed slots
 * @property mixed status
 * @property mixed machine
 * @property mixed price_per_slot
 * @property mixed game
 * @property mixed expires_on
 * @property mixed port
 * @property mixed expire_on
 */
class ServerResource extends JsonResource
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
            'slots' => $this->slots,
            'price_per_slot' => $this->price_per_slot,
            'status' => $this->status,
            'machine' => new MachineResource($this->machine),
            'port' => $this->port,
            'expire_on' => $this->expire_on,
            'game' => [
                'name' => $this->game->name
            ]
        ];
    }
}
