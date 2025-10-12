<?php

namespace App\Http\Controllers;

use App\Http\Resources\Project\DesignStyleResource;
use App\Models\Project\DesignStyle;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\JsonResponse;

#[Group('Design styles')]
class DesignStyleController extends Controller
{
    /**
     * List design styles
     */
    public function index(): JsonResponse
    {
        return DesignStyleResource::collection(DesignStyle::all())
            ->response();
    }
}
