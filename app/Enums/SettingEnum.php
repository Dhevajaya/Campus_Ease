<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SettingEnum extends Enum
{
    const AVATAR_EXT = ['jpeg','jpg','png'];
    const LOGO_EXT = ['jpeg','jpg','png'];
    const BANNER_HOME_EXT = ['jpeg','jpg','png'];
}
