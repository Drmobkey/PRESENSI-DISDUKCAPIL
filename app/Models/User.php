<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'no_id',
        'tanggal_lahir',
        'status',
        'jenis_kelamin',
        'telepon',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->no_id)) {
                $model->no_id = 'DCPSMG-' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            }
        });
    }

    // public function karyawan()
    // {
    //     return $this->belongsTo(Karyawan::class, 'karyawan_id');
    // }

    public function presensis()
    {
        return $this->hasMany(Presensi::class);
    }



    // public function cuti()
    // {
    //     return $this->hasOne(Cuti::class);
    // }



    // public function hasRole($role)
    // {
    //     return $this->role == $role; // Sesuaikan dengan logika peran Anda
    // }

    public function catalog()
    {
        return $this->hasMany(Logbook::class,'user_id');
    }

    
}
