<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $table = 'logbook';

    protected $fillable =['user_id', 'description'];

    public function logbookUser(){
        return $this->belongsTo(User::class,'user_id');
    }
}
