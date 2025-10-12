<?php

namespace App\Http\Resources;

use App\Enums\Auth\TokenName;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read User $resource
 */
class TokenResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'access_token' => $this->resource->createToken(TokenName::Mobile->value)->plainTextToken,
        ];
    }
}
