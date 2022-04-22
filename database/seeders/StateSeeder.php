<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    

    /**
     * Run the database seeds.
     *
     * @return void
     */
  
    public function run()
    {
        State::create(['id'=>'1','name'=>'Amazonas']);
        State::create(['id'=>'2','name'=>'Antioquia']);
        State::create(['id'=>'3','name'=>'Arauca']);
        State::create(['id'=>'4','name'=>'Atlantico']);
        State::create(['id'=>'5','name'=>'Bogotá']);
        State::create(['id'=>'6','name'=>'Bolivar']);
        State::create(['id'=>'7','name'=>'Boyaca']);
        State::create(['id'=>'8','name'=>'Caldas']);
        State::create(['id'=>'9','name'=>'Caqueta']);
        State::create(['id'=>'10','name'=>'Casanare']);
        State::create(['id'=>'11','name'=>'Cauca']);
        State::create(['id'=>'12','name'=>'Cesar']);
        State::create(['id'=>'13','name'=>'Choco']);
        State::create(['id'=>'14','name'=>'Cordoba']);
        State::create(['id'=>'15','name'=>'Cundinamarca']);
        State::create(['id'=>'16','name'=>'Guainia']);
        State::create(['id'=>'17','name'=>'Guaviare']);
        State::create(['id'=>'18','name'=>'Huila']);
        State::create(['id'=>'19','name'=>'La Guajira']);
        State::create(['id'=>'20','name'=>'Magdalena']);
        State::create(['id'=>'21','name'=>'Meta']);
        State::create(['id'=>'22','name'=>'Nariño']);
        State::create(['id'=>'23','name'=>'Norte de Santander']);
        State::create(['id'=>'24','name'=>'Putumayo']);
        State::create(['id'=>'25','name'=>'Quindio']);
        State::create(['id'=>'26','name'=>'Risaralda']);
        State::create(['id'=>'27','name'=>'San Andres']);
        State::create(['id'=>'28','name'=>'Santander']);
        State::create(['id'=>'29','name'=>'Sucre']);
        State::create(['id'=>'30','name'=>'Tolima']);
        State::create(['id'=>'31','name'=>'Valle']);
        State::create(['id'=>'32','name'=>'Vaupes']);
        State::create(['id'=>'33','name'=>'Vichada']);

    }

}
