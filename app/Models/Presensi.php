<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensis';

    protected $fillable = [
        'user_id',
        'tanggal',
        'status',
        'lokasi',
        'jam_masuk',
        'jam_pulang',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
