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
 * @property mixed locations
 * @property mixed min_slots
 * @property mixed max_slots
 * @property mixed mods
 * @property mixed increase_by
 * @property mixed min_gigabytes
 * @property mixed max_gigabytes
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
            'image' => isset($this->image) ? $this->image->path : null,
            'min_slots' => (int) $this->min_slots,
            'max_slots' => (int) $this->max_slots,
            'increase_by' => (int) $this->increase_by,
            'min_gigabytes' => (int) $this->min_gigabytes,
            'max_gigabytes' => (int) $this->max_gigabytes,
            'description' => $this->description,
            'mods' => $this->structureMods($this->mods),
            'locations' => $this->structureLocations($this->locations)
        ];
    }

    private function structureLocations($locations)
    {
        if(!$locations) {
            return null;
        }
        $output = array();
        $i = 0;
        foreach ($locations as $location) {
            $output[$i]['id'] = $location->id;
            $output[$i]['city'] = $location->city;
            $output[$i]['country'] = $location->country;
            $output[$i]['price'] = $location->pivot->price;
            $i++;
        }

        return $output;
    }

    private function structureMods($mods)
    {
        if(!$mods) {
            return null;
        }

        $output = array();
        $i = 0;
        foreach ($mods as $mod) {
            $output[$i]['id'] = $mod->id;
            $output[$i]['name'] = $mod->name;
            $i++;
        }

        return $output;
    }
}
