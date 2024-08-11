<?php

// Function settings()
use App\Settings\WebSetting;

if (! function_exists('web_settings')) {
    function web_settings(string $group, string $key)
    {
        return match ($group) {
            'web' => app(WebSetting::class)->$key,
            default => null,
        };
    }
}
