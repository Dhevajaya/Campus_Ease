<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class WebSetting extends Settings
{
    public ?string $website_logo;

    public ?string $website_logo_dark;

    public ?string $website_name;

    public ?string $website_keywords;

    public ?string $website_description;

    public ?string $website_phone;

    public ?string $website_address;

    public ?string $website_email;

    public ?string $principal_name;

    public ?string $principal_welcome;

    public ?string $principal_avatar;

    public ?string $home_quotes;

    public ?string $home_banner;

    public static function group(): string
    {
        return 'web';
    }
}
