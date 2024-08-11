<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
use Auth;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RoleEnum extends Enum
{
    const SUPERADMIN = 'Super Admin';
    const ADMINISTRATOR = 'Administrator';
    const TEACHER = 'Teacher';
    const EMPLOYEE = 'Employee';

    public static function roles()
    {
        $roles = [
            'Super Admin',
            'Administrator',
            'Teacher',
            'Employee',
        ];

        if(Auth::user()->isAdministrator()){
            unset($roles[0]);
            unset($roles[1]);
        }
        return $roles; 
    }
}
