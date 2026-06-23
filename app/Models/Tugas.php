<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tugas extends Model
{
    protected $table = 'tugas';

    protected $fillable = [
        'judul',
        'deskripsi',
        'user_id',
        'status',
        'deadline'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}