<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    public function customer (){
        return $this->belongsTo(Customer::class, 'id_customers');
    }
    public function bank (){
        return $this->hasMany(Bank::class,'id_banks');
    }
    public function city (){
        return $this->belongsTo(City::class, 'id_cities');
    }
    public function state (){
        return $this->belongsTo(State::class, 'id_state');
    }

    protected $fillable = 
    [
            'code',
            'date',
            'name_project',
            'observations',
            'execution_time',
            'subtotal',
            'iva',
            'total',
            'value_add',
            'validity',
            'status',
            'fscope',
            'funit_value',
            'sscope',
            'sunit_value',
            'tscope',
            'tunit_value',
            'payment_method',
            'id_customers',
            'id_cities',
            'id_state'
    ];
}
