<?php

namespace App\Models\Project;

use App\Models\Model;

/**
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $image
 */
class DesignStyle extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
    ];
}
