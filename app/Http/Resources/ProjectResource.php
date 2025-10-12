<?php

namespace App\Http\Resources;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Project $resource
 */
class ProjectResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->resource->id,
            'image' => $this->resource->image,
            'style_id' => $this->resource->style_id,
            'palette_id' => $this->resource->palette_id,
        ];
    }
}
