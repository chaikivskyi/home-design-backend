<?php

namespace App\Http\Controllers;

use App\Http\Resources\Project\ColorPaletteResource;
use App\Models\Project\ColorPalette;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\JsonResponse;

#[Group('Color Palettes')]
class ColorPaletteController extends Controller
{
    /**
     * List color palettes
     */
    public function index(): JsonResponse
    {
        return ColorPaletteResource::collection(ColorPalette::all())
            ->response();
    }
}
