<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScopeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('scopes')->insert([
            'name' => 'Inspección RETILAP proceso de iluminación interior',
        ]);
        DB::table('scopes')->insert([
            'name' => 'Inspección RETILAP proceso de iluminación exterior',
        ]);
        DB::table('scopes')->insert([
            'name' => 'Inspección RETILAP proceso de alumbrado público',
        ]);
    }
}
