<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Spatie

use Spatie\Permission\Models\Permission;

class SeederTablePermit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Para agregar estos datos a la DB, se ejecuta comando 'php artisan db:seed --class=SeederTablePermit'
        // Estos roles vienen definidios desde 'RolController,php'

        $permits = [

            // Permisos tabla de roles
            'show.rol',
            'create.rol',
            'edit.rol',
            'delete.rol',
            // Permisos tabla de clientes
            'show.customer',
            'create.customer',
            'edit.customer',
            'delete.customer',
            // Permisos tabla cotizaciones
            'show.quote',
            'create.quote',
            'edit.quote',
            'delete.quote',
            // Permisos tabla de usuarios
            'show.user',
            'create.user',
            'edit.user',
            'delete.user',
        ];
        foreach($permits as $permit){
            Permission::create(['name'=>$permit]);
        }
    }
}
