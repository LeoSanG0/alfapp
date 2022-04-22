<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('dnis')->insert([
            'name' => 'Cédula de ciudadanía',
        ]);
        DB::table('dnis')->insert([
            'name' => 'Cédula de extranjeria',
        ]);
    }
}
