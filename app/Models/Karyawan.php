<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_id',
        'tanggal_lahir',
        'status',
        'jenis_kelamin',
        'telepon',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->no_id)) {
                $model->no_id = 'DCPSMG-' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function user()
    {
        return $this->hasOne(User::class, 'karyawan_id');
    }
}
