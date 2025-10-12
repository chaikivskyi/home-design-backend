<?php

namespace App\Models\Project;

use App\Models\Model;

/**
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property array<array{name: string, hex: string}> $swatches
 */
class ColorPalette extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'swatches',
    ];

    protected $casts = [
        'swatches' => 'array',
    ];
}
