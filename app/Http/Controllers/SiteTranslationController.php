<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSiteTranslationRequest;
use App\Models\SiteTranslation;
use App\Support\SiteText;
use Illuminate\Support\Collection;

class SiteTranslationController extends Controller
{
    public function index()
    {
        $storedTranslations = SiteTranslation::query()->get()->keyBy('key');

        $groups = collect(SiteText::keys())
            ->map(function (string $key) use ($storedTranslations) {
                $stored = $storedTranslations->get($key);

                return [
                    'key' => $key,
                    'label' => str_replace('.', ' / ', str_replace('site.', '', $key)),
                    'group' => explode('.', str_replace('site.', '', $key))[0],
                    'en_value' => old("translations.$key.en", $stored?->en_value ?? SiteText::defaults('en')[$key] ?? ''),
                    'mm_value' => old("translations.$key.mm", $stored?->mm_value ?? SiteText::defaults('mm')[$key] ?? ''),
                ];
            })
            ->groupBy('group');

        return view('Dashboard.SiteTranslations.index', [
            'groups' => $groups,
        ]);
    }

    public function update(UpdateSiteTranslationRequest $request)
    {
        $translations = $request->validated('translations', []);
        $allowedKeys = SiteText::keys();

        foreach ($allowedKeys as $key) {
            $payload = $translations[$key] ?? [];
            $enValue = isset($payload['en']) ? trim((string) $payload['en']) : null;
            $mmValue = isset($payload['mm']) ? trim((string) $payload['mm']) : null;

            if ($enValue === '' && $mmValue === '') {
                SiteTranslation::query()->where('key', $key)->delete();
                continue;
            }

            SiteTranslation::query()->updateOrCreate(
                ['key' => $key],
                [
                    'en_value' => $enValue !== '' ? $enValue : null,
                    'mm_value' => $mmValue !== '' ? $mmValue : null,
                ]
            );
        }

        SiteText::clearCache();

        return redirect()->route('site-translations.index')->with('success', 'Language texts updated successfully.');
    }
}
