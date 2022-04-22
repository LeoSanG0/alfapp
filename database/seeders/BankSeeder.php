<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bank::create([
            'method'=>'General',
            'name_bank'=>'Bancolombia',
            'account_number'=>'261852606-80',
            'account_type'=>'Corriente'   
        ]);
        Bank::create([
            'method'=>'General',
            'name_bank'=>'Banco de Bogotá',
            'account_number'=>'CC159-21239-8',
            'account_type'=>'Corriente'
        ]);   
    }
}
