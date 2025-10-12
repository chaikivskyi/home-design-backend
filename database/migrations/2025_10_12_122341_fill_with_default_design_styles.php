<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $now = Carbon::now();

        foreach ($this->getStyles() as $style) {
            $payload = [
                'id' => (string) Str::uuid7(),
                'name' => $style['name'],
                'slug' => Str::slug($style['name']),
                'image' => $style['image'],
                'updated_at' => $now,
            ];

            DB::table('design_styles')->updateOrInsert(
                ['slug' => $payload['slug']],
                $payload + ['created_at' => $now]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $slugs = array_map(fn ($style) => Str::slug($style['name']), $this->getStyles());

        DB::table('design_styles')->whereIn('slug', $slugs)->delete();
    }

    private function getStyles(): array
    {
        return [
            ['name' => 'Scandinavian',        'image' => '/images/styles/scandinavian.jpg'],
            ['name' => 'Japandi',             'image' => '/images/styles/japandi.jpg'],
            ['name' => 'Minimalist',          'image' => '/images/styles/minimalist.jpg'],
            ['name' => 'Mid-Century Modern',  'image' => '/images/styles/mid-century-modern.jpg'],
            ['name' => 'Contemporary',        'image' => '/images/styles/contemporary.jpg'],
            ['name' => 'Industrial',          'image' => '/images/styles/industrial.jpg'],
            ['name' => 'Modern Farmhouse',    'image' => '/images/styles/modern-farmhouse.jpg'],
            ['name' => 'Bohemian',            'image' => '/images/styles/bohemian.jpg'],
            ['name' => 'Art Deco',            'image' => '/images/styles/art-deco.jpg'],
            ['name' => 'Wabi-Sabi',           'image' => '/images/styles/wabi-sabi.jpg'],
            ['name' => 'Organic Modern',      'image' => '/images/styles/organic-modern.jpg'],
            ['name' => 'Coastal',             'image' => '/images/styles/coastal.jpg'],
            ['name' => 'Mediterranean',       'image' => '/images/styles/mediterranean.jpg'],
            ['name' => 'Rustic',              'image' => '/images/styles/rustic.jpg'],
            ['name' => 'Traditional',         'image' => '/images/styles/traditional.jpg'],
            ['name' => 'Transitional',        'image' => '/images/styles/transitional.jpg'],
            ['name' => 'Maximalist',          'image' => '/images/styles/maximalist.jpg'],
            ['name' => 'Eclectic',            'image' => '/images/styles/eclectic.jpg'],
        ];
    }
};
