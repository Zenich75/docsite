<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Confirmation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'file_id',
    ];

    public function user (): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function file (): BelongsTo
    {
        return $this->belongsTo(Media::class, 'file_id', 'id');
    }
}
