<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

#[Group('Projects')]
class ProjectController extends Controller
{
    use AuthorizesRequests;

    /**
     * Store a new project
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'image' => ['required', 'image', 'max:20000'],
        ]);

        $path = $request
            ->file('image')
            ?->store('projects/'.$request->user()?->id, 'public');

        $project = Project::create([
            'user_id' => $request->user()?->id,
            'image' => $path,
            'style_id' => $request->style_id,
            'palette_id' => $request->palette_id,
        ]);

        return ProjectResource::make($project)
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Show a project
     */
    public function show(Project $project): JsonResponse
    {
        $this->authorize('view', $project);

        return ProjectResource::make($project)
            ->response();
    }

    /**
     * Update a project
     */
    public function update(Request $request, Project $project): JsonResponse
    {
        $this->authorize('update', $project);

        $presenceRule = $request->isMethod(Request::METHOD_PUT) ? 'required' : 'sometimes';

        /**
         * @var array<string, mixed>
         */
        $data = $request->validate([
            'style_id' => [$presenceRule, 'nullable', 'uuid', 'exists:design_styles,id'],
            'palette_id' => [$presenceRule, 'nullable', 'uuid', 'exists:color_palettes,id'],
        ]);

        $project->update($data);

        return ProjectResource::make($project)
            ->response();
    }
}
