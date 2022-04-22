<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'fname'=>'Super',
            'lname'=>'administrador',
            'dni_type'=>'Cedula',
            'dni'=>'18511765',
            'phone'=>'3195555555',
            'address'=>'K 112',
            'email'=>'admin@gmail.com',
            'password'=> bcrypt('1234')
        ])->assignRole('super-admin');
        User::create([
            'fname'=>'Leo',
            'lname'=>'Sanclemente',
            'dni_type'=>'Cedula',
            'dni'=>'1.1278.945.216',
            'phone'=>'3195557-*027',
            'address'=>'K 112 48-92',
            'email'=>'leosg6n@gmail.com',
            'password'=> bcrypt('1234')
        ])->assignRole('Comercial');
    }
}
