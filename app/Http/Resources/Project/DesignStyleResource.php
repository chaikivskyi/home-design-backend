<?php

namespace App\Http\Resources\Project;

use App\Models\Project\DesignStyle;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read DesignStyle $resource
 */
class DesignStyleResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            'image' => $this->resource->image,
        ];
    }
}
