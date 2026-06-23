<?php

namespace App\Models;

use App\Models\Tugas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'jabatan',
        'password',
        'is_tugas',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'is_tugas' => 'boolean',
        ];
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}