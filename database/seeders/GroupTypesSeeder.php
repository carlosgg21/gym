<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
USE Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GroupTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_types')->insert([
            'type' => 'Zumba',
            'description' => 'Ejercicio cardiovascular va dirigida a todas aquellas personas que quieran mantener o bajar de peso de forma divertida al son de distintos ritmos, principalmente latinos, que ponen en funcionamiento todos los músculos del cuerpo.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('group_types')->insert([
            'type' => 'Aerobic',
            'description' => 'Ejercicio cardiovascular.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('group_types')->insert([
            'type' => 'Crossfit',
            'description' => 'Este sistema de entrenamiento, que algunos comparan a la dinámica que se sigue en el ejército, es uno de los más exigentes y de los que mayor gasto energético conlleva.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('group_types')->insert([
            'type' => 'Spinning',
            'description' => 'Ejercicio cardiovascular lleva al corazón a sus máximas pulsaciones a través del pedaleo siguiendo el ritmo de la música.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('group_types')->insert([
            'type' => 'Body pump',
            'description' => 'Es una clase coreografiada de musculación en la que en cada canción se trabaja un músculo.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('group_types')->insert([
            'type' => 'Body combat',
            'description' => 'Clase cardiovascular que busca acelerar el corazón mediante una combinación de movimientos de lucha y artes marciales.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('group_types')->insert([
            'type' => 'Aqua Gym ',
            'description' => ' Tipo de ejercicios que se realizan en el agua.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('group_types')->insert([
            'type' => 'Yoga',
            'description' => 'Ejercicio que se centran en la flexibilidad y la plasticidad de tu cuerpo.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('group_types')->insert([
            'type' => ' Tai-Chi',
            'description' => 'Ejercicio cardiovascular va dirigida a todas aquellas personas que quieran mantener o bajar de peso de forma divertida al son de distintos ritmos, principalmente latinos, que ponen en funcionamiento todos los músculos del cuerpo.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
