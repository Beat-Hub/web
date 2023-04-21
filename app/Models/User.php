<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'age',
        'city',
        'school',
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
    public function beats(){
        return $this->hasMany(Beat::class);
    }
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Beat::class, 'likes');
    }
    public function countMp3AndWavFiles()
    {
        $beats = $this->beats; // obtiene todos los beats del usuario
        $mp3_count = 0; // inicializa el contador de archivos MP3 en cero
        $wav_count = 0; // inicializa el contador de archivos WAV en cero

        foreach ($beats as $beat) {
            if ($beat->mp3_file) {
                $mp3_count++;
            }
            if ($beat->wav_file) {
                $wav_count++;
            }
        }

        return max($mp3_count, $wav_count); // devuelve el número más grande entre los contadores de archivos MP3 y WAV
    }



}
