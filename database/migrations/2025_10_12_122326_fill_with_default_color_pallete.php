<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $now = Carbon::now();

        foreach ($this->getPalettes() as $palette) {
            $newRow = [
                'id' => (string) Str::uuid7(),
                'name' => $palette['name'],
                'slug' => Str::slug($palette['name']),
                'swatches' => json_encode($palette['swatches'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                'created_at' => $now,
                'updated_at' => $now,
            ];

            DB::table('color_palettes')->updateOrInsert(
                ['slug' => $newRow['slug']],
                $newRow
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $slugs = array_map(
            fn (array $palette) => Str::slug($palette['name']),
            $this->getPalettes()
        );
        DB::table('color_palettes')->whereIn('slug', $slugs)->delete();
    }

    private function getPalettes(): array
    {
        return [
            [
                'name' => 'Warm Earthscape',
                'swatches' => [
                    ['name' => 'Terracotta', 'hex' => '#D08C60'],
                    ['name' => 'Clay',       'hex' => '#B36A5E'],
                    ['name' => 'Sage',       'hex' => '#A3B18A'],
                    ['name' => 'Mustard',    'hex' => '#C49A3A'],
                    ['name' => 'Cream',      'hex' => '#F5F0E6'],
                ],
            ],
            [
                'name' => 'Dusty Botanica',
                'swatches' => [
                    ['name' => 'Olive',        'hex' => '#6B8E23'],
                    ['name' => 'Dusty Mauve',  'hex' => '#B784A7'],
                    ['name' => 'Muted Lavender', 'hex' => '#9C8AA5'],
                    ['name' => 'Soft Beige',   'hex' => '#E9E3D5'],
                    ['name' => 'Chalk White',  'hex' => '#F7F7F2'],
                ],
            ],
            [
                'name' => 'Sunlit Warmth',
                'swatches' => [
                    ['name' => 'Butter',   'hex' => '#F6E2A6'],
                    ['name' => 'Wheat',    'hex' => '#E6D3A3'],
                    ['name' => 'Warm Rust', 'hex' => '#C06A43'],
                    ['name' => 'Cream',    'hex' => '#FFF7E6'],
                    ['name' => 'Light Gray', 'hex' => '#D9D9D9'],
                ],
            ],
            [
                'name' => 'Deep Accent Pop',
                'swatches' => [
                    ['name' => 'Taupe',    'hex' => '#8E7D70'],
                    ['name' => 'Charcoal', 'hex' => '#36454F'],
                    ['name' => 'Oxblood',  'hex' => '#5B1A18'],
                    ['name' => 'Deep Blue', 'hex' => '#003366'],
                    ['name' => 'Off-White', 'hex' => '#FAF9F6'],
                ],
            ],
            [
                'name' => 'Mocha & Moss',
                'swatches' => [
                    ['name' => 'Mocha',      'hex' => '#7B5A4A'],
                    ['name' => 'Ashwood Moss', 'hex' => '#677D6A'],
                    ['name' => 'Dusty Rose', 'hex' => '#C9A3A9'],
                    ['name' => 'Cream',      'hex' => '#F1E8E1'],
                    ['name' => 'Beige',      'hex' => '#D9CFC3'],
                ],
            ],
            [
                'name' => 'Coastal Calm',
                'swatches' => [
                    ['name' => 'Seafoam',  'hex' => '#B7E4C7'],
                    ['name' => 'Mist Blue', 'hex' => '#A0C4FF'],
                    ['name' => 'Sand',     'hex' => '#EADBC8'],
                    ['name' => 'Driftwood', 'hex' => '#8C7A6B'],
                    ['name' => 'White',    'hex' => '#FFFFFF'],
                ],
            ],
            [
                'name' => 'Japandi Neutrals',
                'swatches' => [
                    ['name' => 'Warm Greige', 'hex' => '#B8A99A'],
                    ['name' => 'Soft Black',  'hex' => '#1A1A1A'],
                    ['name' => 'Natural Wood', 'hex' => '#C8A974'],
                    ['name' => 'Sage Gray',   'hex' => '#A3A8A0'],
                    ['name' => 'Linen',       'hex' => '#EFE9E1'],
                ],
            ],
            [
                'name' => 'Desert Clay',
                'swatches' => [
                    ['name' => 'Clay',        'hex' => '#C57B57'],
                    ['name' => 'Adobe',       'hex' => '#D19C6A'],
                    ['name' => 'Desert Sand', 'hex' => '#EDC9AF'],
                    ['name' => 'Cactus',      'hex' => '#6E8B3D'],
                    ['name' => 'Bone',        'hex' => '#EDE6DE'],
                ],
            ],
            [
                'name' => 'Moody Blues',
                'swatches' => [
                    ['name' => 'Slate',  'hex' => '#5A6C7D'],
                    ['name' => 'Navy',   'hex' => '#0B3D91'],
                    ['name' => 'Teal',   'hex' => '#2F6F7E'],
                    ['name' => 'Smoke',  'hex' => '#B0B8C5'],
                    ['name' => 'Paper',  'hex' => '#F5F7FA'],
                ],
            ],
            [
                'name' => 'Pastel Sunrise',
                'swatches' => [
                    ['name' => 'Blush',  'hex' => '#FDE2E4'],
                    ['name' => 'Peach',  'hex' => '#FAD2E1'],
                    ['name' => 'Honey',  'hex' => '#FFF1BF'],
                    ['name' => 'Lilac',  'hex' => '#E4D7FF'],
                    ['name' => 'Cream',  'hex' => '#FFF7ED'],
                ],
            ],
        ];
    }
};
