<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Spatie
use Spatie\Permission\Traits\HasRoles;

class Customer extends Model
{
    use HasFactory, HasRoles;
    
    protected $fillable = ['fname_contact', 'lname_contact', 'company', 'nit', 'address', 'phone', 'email', 'id_companies'];

    public function company (){
        return $this->belongsTo(Company::class, 'id_companies');
    }



}
