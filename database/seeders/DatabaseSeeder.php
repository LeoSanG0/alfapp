<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(BankSeeder::class);
        $this->call(ScopeSeeder::class);
        $this->call(SeederTablePermit::class);
        $this->call(CompanySeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(DniSeeder::class);
        $this->call(QuoteSeeder::class);   
    }
}
