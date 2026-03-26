<?php

namespace App\Support;

use App\Models\SiteTranslation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class SiteText
{
    private const CACHE_KEY = 'site_text.overrides';

    public static function get(string $key, array $replace = [], ?string $locale = null): string
    {
        $locale ??= app()->getLocale();
        $fallbackLocale = config('app.fallback_locale', 'en');
        $column = $locale === 'mm' ? 'mm_value' : 'en_value';

        $override = static::overrides()->get($key);
        $value = $override?->{$column};

        if (blank($value) && $locale !== $fallbackLocale) {
            $value = $override?->en_value;
        }

        if (filled($value)) {
            return static::replace($value, $replace);
        }

        $fallback = Lang::get($key, $replace, $locale);

        if (($fallback === $key || ! is_string($fallback)) && $locale !== $fallbackLocale) {
            $fallback = Lang::get($key, $replace, $fallbackLocale);
        }

        return is_string($fallback) ? $fallback : $key;
    }

    public static function keys(): array
    {
        return array_keys(static::defaults('en'));
    }

    public static function defaults(string $locale = 'en'): array
    {
        $path = lang_path($locale.'/site.php');

        if (! file_exists($path)) {
            return [];
        }

        /** @var array<string, mixed> $translations */
        $translations = require $path;

        return static::flatten($translations, 'site');
    }

    public static function clearCache(): void
    {
        Cache::forget(static::CACHE_KEY);
    }

    private static function overrides()
    {
        return Cache::rememberForever(static::CACHE_KEY, function () {
            return SiteTranslation::query()->get()->keyBy('key');
        });
    }

    /**
     * @param  array<string, mixed>  $items
     * @return array<string, string>
     */
    private static function flatten(array $items, string $prefix): array
    {
        $flattened = [];

        foreach ($items as $key => $value) {
            $fullKey = $prefix.'.'.$key;

            if (is_array($value)) {
                $flattened += static::flatten($value, $fullKey);
                continue;
            }

            $flattened[$fullKey] = (string) $value;
        }

        return $flattened;
    }

    /**
     * @param  array<string, string>  $replace
     */
    private static function replace(string $value, array $replace): string
    {
        foreach ($replace as $key => $replacement) {
            $value = str_replace(':'.$key, $replacement, $value);
            $value = str_replace(':'.Str::upper($key), Str::upper($replacement), $value);
            $value = str_replace(':'.Str::ucfirst($key), Str::ucfirst($replacement), $value);
        }

        return $value;
    }
}
