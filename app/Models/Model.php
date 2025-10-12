<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model as EloqentModel;

class Model extends EloqentModel
{
    use HasUuids;

    protected static function boot(): void
    {
        parent::boot();
        self::creating(function (self $model) {
            $model->id ??= $model->newUniqueId();
        });
    }
}
