<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class FilePublic extends Model
{
    use HasFactory,SoftDeletes,Loggable;
    protected $table = 'files_public';
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
