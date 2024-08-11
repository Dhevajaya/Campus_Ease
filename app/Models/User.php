<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Lab404\Impersonate\Models\Impersonate;
use App\Enums\RoleEnum;
use App\Enums\UserEnum;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles , SoftDeletes, Loggable , Impersonate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',
        'avatar',
        'status',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function status()
    {
        $return = null;
        switch ($this->status) {
            case UserEnum::STATUS_ACTIVE:
                $return = (object) [
                    'class' => 'success',
                    'msg' => 'Aktif',
                ];
                break;

            case UserEnum::STATUS_INACTIVE:
                $return = (object) [
                    'class' => 'warning',
                    'msg' => 'Tidak Aktif',
                ];
                break;
        }

        return $return;
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole(RoleEnum::SUPERADMIN);
    }

    public function isAdministrator(): bool
    {
        return $this->hasRole(RoleEnum::ADMINISTRATOR);
    }

    public function isTeacher(): bool
    {
        return $this->hasRole(RoleEnum::TEACHER);
    }

    public function isEmployee(): bool
    {
        return $this->hasRole(RoleEnum::EMPLOYEE);
    }
}
