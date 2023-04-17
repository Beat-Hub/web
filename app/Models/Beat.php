<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
