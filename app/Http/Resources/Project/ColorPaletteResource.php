<?php

namespace App\Http\Resources\Project;

use App\Models\Project\ColorPalette;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read ColorPalette $resource
 */
class ColorPaletteResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            /** @var array<array{name: string, hex: string}> */
            'swatches' => $this->resource->swatches,
        ];
    }
}
