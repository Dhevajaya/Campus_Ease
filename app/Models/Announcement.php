<?php

namespace App\Models;

use App\Traits\FormatDates;
use App\Traits\TrixRender;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use HasFactory,SoftDeletes, FormatDates, Loggable, HasTrixRichText , TrixRender;

    protected $table = 'announcements';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'cover',
        'fragment',
        'date',
        'published_at',
        'announcement-trixFields',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}