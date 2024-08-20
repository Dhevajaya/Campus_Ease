<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
// use App\Traits\TrixRender;
// use Haruncpi\LaravelUserActivity\Traits\Loggable;


// class DaftarUniversitas extends Model
// {
//     use HasFactory, HasTrixRichText, TrixRender, Loggable;
//     protected $table = "daftaruniversitas";
//     protected $fillable = [
//         'title',
//         'image',
//         'daftaruniversitas-trixFields',
//     ];
// }


namespace App\Models;

use App\Traits\FormatDates;
use App\Traits\TrixRender;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
use Illuminate\Database\Eloquent\SoftDeletes;

class DaftarUniversitas extends Model
{
    use HasFactory, SoftDeletes, FormatDates, Loggable, HasTrixRichText, TrixRender;

    protected $table = 'daftaruniversitas';
    protected $fillable = [
        'user_id',
        'title',
        'image',
        'daftaruniversitas-trixFields',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
