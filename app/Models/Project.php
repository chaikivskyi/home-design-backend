<?php

namespace App\Models;

use App\Models\Project\ColorPalette;
use App\Models\Project\DesignStyle;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $user_id
 * @property string $image
 * @property ?string $style_id
 * @property ?string $palette_id
 * @property-read User $user
 * @property-read ?DesignStyle $style
 * @property-read ?ColorPalette $palette
 */
class Project extends Model
{
    protected $fillable = [
        'user_id',
        'image',
        'style_id',
        'palette_id',
    ];

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<DesignStyle, $this>
     */
    public function style(): BelongsTo
    {
        return $this->belongsTo(DesignStyle::class, 'style_id');
    }

    /**
     * @return BelongsTo<ColorPalette, $this>
     */
    public function palette(): BelongsTo
    {
        return $this->belongsTo(ColorPalette::class, 'palette_id');
    }
}
