<?php

namespace Database\Seeders;

use App\Models\SiteTranslation;
use App\Support\SiteText;
use Illuminate\Database\Seeder;

class SiteTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $english = SiteText::defaults('en');
        $myanmar = SiteText::defaults('mm');
        $keys = array_values(array_unique(array_merge(array_keys($english), array_keys($myanmar))));

        SiteTranslation::query()->whereNotIn('key', $keys)->delete();

        foreach ($keys as $key) {
            $enValue = isset($english[$key]) ? trim((string) $english[$key]) : null;
            $mmValue = isset($myanmar[$key]) ? trim((string) $myanmar[$key]) : null;

            SiteTranslation::query()->updateOrCreate(
                ['key' => $key],
                [
                    'en_value' => $enValue !== '' ? $enValue : null,
                    'mm_value' => $mmValue !== '' ? $mmValue : null,
                ]
            );
        }

        SiteText::clearCache();
    }
}