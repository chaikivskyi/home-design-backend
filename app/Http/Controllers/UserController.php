<?php

namespace App\Http\Controllers;

use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Get the authenticated user
     */
    public function me(Request $request): JsonResponse
    {
        return UserResource::make($request->user())
            ->response();
    }

    /**
     * Register a new user
     *
     * @unauthenticated
     */
    public function store(Request $request): JsonResponse
    {
        /** @var array<string, mixed> $validated */
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
        ]);

        $validated['password'] = Hash::make($request->string('password'));

        event(new Registered(($user = User::create($validated))));

        return UserResource::make($user)
            ->additional(['meta' => ['token' => TokenResource::make($user)]])
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
