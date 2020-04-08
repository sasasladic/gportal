<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class ServerCollection. THIS IS JUST EXAMPLE
 * @package App\Http\Resources
 */
class ServerCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\ServerResource';
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'count' => $this->collection->count()
        ];
    }
}
