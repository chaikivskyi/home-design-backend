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
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->resource->id,
            'image_url' => $this->resource->image_url,
            'style_id' => $this->resource->style_id,
            'palette_id' => $this->resource->palette_id,
        ];
    }
}
