<?php

namespace App\Models\Concerns;

trait HasLocalizedAttributes
{
    public function localized(string $attribute, ?string $locale = null): mixed
    {
        $locale ??= app()->getLocale();

        if ($locale === config('app.fallback_locale', 'en')) {
            return $this->getAttribute($attribute);
        }

        $localizedAttribute = "{$attribute}_{$locale}";
        $localizedValue = $this->getAttribute($localizedAttribute);

        return filled($localizedValue) ? $localizedValue : $this->getAttribute($attribute);
    }

    public function localizedList(string $attribute, string $separator = '/'): array
    {
        $value = (string) $this->localized($attribute);

        return collect(explode($separator, $value))
            ->map(fn (string $item) => trim($item))
            ->filter()
            ->values()
            ->all();
    }
}
