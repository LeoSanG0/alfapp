<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public function states(){
        return $this->hasMany(City::class,'id');
    }
    protected $fillable = [
        'name',
    ];
}
