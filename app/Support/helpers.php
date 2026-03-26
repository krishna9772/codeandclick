<?php

use App\Support\SiteText;

if (! function_exists('site_text')) {
    /**
     * @param  array<string, string>  $replace
     */
    function site_text(string $key, array $replace = [], ?string $locale = null): string
    {
        return SiteText::get($key, $replace, $locale);
    }
}
