<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Beat extends Model
{
    use HasFactory;

    protected $fillable = [
        'beat_name',
        'bpm',
        'genre',
        'price_mp3',
        'price_wav',
        'mp3_file',
        'wav_file',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function hasUserLiked(User $user): bool
    {
        return $this->likes()->whereRelation('user', 'id', auth()->user()->id)->exists();
    }
}
